<?php

namespace App\Http\Controllers;

use App\Models\Property;

class HomeController extends Controller {
    public function index() {
        // Fetch trending/featured properties with City & Type relations
        $featuredProperties = Property::with(['city', 'type'])
                                ->where('is_featured', true)
                                ->latest()
                                ->take(6)
                                ->get();
        
        $cities = \App\Models\City::all();
                                
        return view('pages.index', compact('featuredProperties', 'cities'));
    }
}
