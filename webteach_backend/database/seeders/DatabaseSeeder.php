<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;
use App\Models\PropertyType;
use App\Models\Property;
use App\Models\MarketTrend;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create Cities
        $nyc = City::firstOrCreate(['slug' => 'new-york'], ['name' => 'New York', 'slug' => 'new-york', 'code' => 'NY']);
        $la = City::firstOrCreate(['slug' => 'los-angeles'], ['name' => 'Los Angeles', 'slug' => 'los-angeles', 'code' => 'LA']);
        $chicago = City::firstOrCreate(['slug' => 'chicago'], ['name' => 'Chicago', 'slug' => 'chicago', 'code' => 'IL']);
        $houston = City::firstOrCreate(['slug' => 'houston'], ['name' => 'Houston', 'slug' => 'houston', 'code' => 'TX']);
        $phoenix = City::firstOrCreate(['slug' => 'phoenix'], ['name' => 'Phoenix', 'slug' => 'phoenix', 'code' => 'AZ']);

        // Create Types
        $apartment = PropertyType::create(['name' => 'Apartment', 'slug' => 'apartment']);
        $villa = PropertyType::create(['name' => 'Villa', 'slug' => 'villa']);
        $commercial = PropertyType::create(['name' => 'Commercial', 'slug' => 'commercial']);
        $farmhouse = PropertyType::create(['name' => 'Farm House', 'slug' => 'farm-house']);
        $studio = PropertyType::create(['name' => 'Studio', 'slug' => 'studio']);
        $penthouse = PropertyType::create(['name' => 'Penthouse', 'slug' => 'penthouse']);

        // Seed Realistic Pakistani Properties
        Property::create([
            'title' => 'Executive Suite',
            'slug' => Str::slug('Executive Suite DHA Phase 6 Lahore'),
            'city_id' => $lahore->id,
            'property_type_id' => $apartment->id,
            'price' => 14500000,
            'area' => 1250,
            'bedrooms' => 3,
            'bathrooms' => 2,
            'purpose' => 'sale',
            'description' => 'Prime location gated community apartment in DHA.',
            'featured_image' => 'p1.jpg',
            'is_featured' => true
        ]);

        Property::create([
            'title' => 'Luxury Villa',
            'slug' => Str::slug('Luxury Villa Bahria Town Islamabad'),
            'city_id' => $islamabad->id,
            'property_type_id' => $villa->id,
            'price' => 28750000,
            'area' => 3500,
            'bedrooms' => 5,
            'bathrooms' => 4,
            'purpose' => 'sale',
            'description' => 'Corner plot park-facing premium villa.',
            'featured_image' => 'p2.jpg',
            'is_featured' => true
        ]);

        Property::create([
            'title' => 'Commercial Plaza',
            'slug' => Str::slug('Commercial Plaza Clifton Block 5 Karachi'),
            'city_id' => $karachi->id,
            'property_type_id' => $commercial->id,
            'price' => 45000000,
            'area' => 8000,
            'purpose' => 'sale',
            'description' => 'Main Boulevard basement commercial plaza.',
            'featured_image' => 'plaza.png',
            'is_featured' => true
        ]);

        Property::create([
            'title' => 'Farm House',
            'slug' => Str::slug('Farm House Chak Shahzad Islamabad'),
            'city_id' => $islamabad->id,
            'property_type_id' => $farmhouse->id,
            'price' => 18900000,
            'area' => 5000,
            'bedrooms' => 4,
            'bathrooms' => 3,
            'purpose' => 'sale',
            'description' => 'Peaceful and scenic farm house.',
            'featured_image' => 'farmhouse.png',
            'is_featured' => true
        ]);
        
        Property::create([
            'title' => 'Studio Apartment',
            'slug' => Str::slug('Studio Apartment Gulberg III Lahore'),
            'city_id' => $lahore->id,
            'property_type_id' => $studio->id,
            'price' => 6800000,
            'area' => 450,
            'bedrooms' => 1,
            'bathrooms' => 1,
            'purpose' => 'sale',
            'description' => 'Furnished compact studio on the main road.',
            'featured_image' => 'studioapartment.png',
            'is_featured' => false
        ]);
        
        Property::create([
            'title' => 'Luxury Penthouse',
            'slug' => Str::slug('Penthouse DHA Phase 8 Karachi'),
            'city_id' => $karachi->id,
            'property_type_id' => $penthouse->id,
            'price' => 35000000,
            'area' => 2800,
            'bedrooms' => 4,
            'bathrooms' => 3,
            'purpose' => 'sale',
            'description' => 'Rooftop sea view exclusive penthouse.',
            'featured_image' => 'penthouse.png',
            'is_featured' => false
        ]);
    }
}
