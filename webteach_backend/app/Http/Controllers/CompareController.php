<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class CompareController extends Controller
{
    public function index(Request $request)
    {
        $compareIds = session()->get('compare_properties', []);
        $properties = Property::with(['city', 'type'])->whereIn('id', $compareIds)->get();
        $allProperties = Property::orderBy('title')->get();
        
        return view('pages.compare', compact('properties', 'allProperties'));
    }

    public function add(Request $request)
    {
        $propertyId = $request->input('property_id');
        $compareIds = session()->get('compare_properties', []);
        
        if (!in_array($propertyId, $compareIds)) {
            if (count($compareIds) >= 3) {
                array_shift($compareIds);
            }
            $compareIds[] = $propertyId;
            session()->put('compare_properties', $compareIds);
        }
        
        return redirect()->route('compare')->with('success', 'Property added to comparison.');
    }

    public function remove(Request $request, $id)
    {
        $compareIds = session()->get('compare_properties', []);
        $compareIds = array_diff($compareIds, [$id]);
        session()->put('compare_properties', $compareIds);
        
        return redirect()->route('compare')->with('success', 'Property removed from comparison.');
    }
}