<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\City;
use App\Models\PropertyType;
use Illuminate\Http\Request;

class PropertyController extends Controller {
    public function index(Request $request) {
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
}
