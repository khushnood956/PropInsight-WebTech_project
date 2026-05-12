<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\City;
use App\Models\PropertyType;
use Illuminate\Http\Request;

class PropertyController extends Controller {
    public function index(Request $request) {
        $request->validate([
            'min_price' => 'nullable|numeric|min:0',
            'max_price' => 'nullable|numeric|gt:min_price',
            'search' => 'nullable|string|max:100',
            'city' => 'nullable|exists:cities,slug',
            'type' => 'nullable|exists:property_types,slug',
        ], [
            'max_price.gt' => 'Maximum price must be greater than minimum price.',
        ]);

        $query = Property::with(['city', 'type']);

        // Filtering Logic
        if ($request->has('city') && !empty($request->city)) {
            $query->whereHas('city', function($q) use ($request) {
                $q->where('slug', $request->city);
            });
        }
        
        if ($request->has('type') && !empty($request->type)) {
            $query->whereHas('type', function($q) use ($request) {
                $q->where('slug', $request->type);
            });
        }

        if ($request->has('min_price') && !empty($request->min_price)) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->has('max_price') && !empty($request->max_price)) {
            $query->where('price', '<=', $request->max_price);
        }

        if ($request->has('search') && !empty($request->search)) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        $properties = $query->paginate(9)->withQueryString();
        $cities = City::all();
        $types = PropertyType::all();

        return view('pages.listings', compact('properties', 'cities', 'types'));
    }

    public function show($slug) {
        $property = Property::with(['city', 'type'])->where('slug', $slug)->firstOrFail();
        return view('pages.property', compact('property'));
    }

    public function requestAnalysis(Request $request, $slug) {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'note' => 'nullable|string|max:1000',
        ]);
        
        return back()->with('success', 'Analysis request submitted successfully. We will contact you soon.');
    }
}
