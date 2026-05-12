<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make('Illuminate\Contracts\Http\Kernel');
$response = $kernel->handle($request = Illuminate\Http\Request::capture());

use App\Models\City;
use App\Models\PropertyType;
use App\Models\Property;
use App\Models\MarketTrend;
use Illuminate\Support\Facades\DB;

// Clear existing data
echo "Clearing existing data...\n";
DB::statement('SET FOREIGN_KEY_CHECKS=0');
Property::truncate();
PropertyType::truncate();
City::truncate();
MarketTrend::truncate();
DB::statement('SET FOREIGN_KEY_CHECKS=1');

// Cities
echo "Creating cities...\n";
$nyc = City::create(['name' => 'New York', 'slug' => 'new-york']);
$la = City::create(['name' => 'Los Angeles', 'slug' => 'los-angeles']);
$chicago = City::create(['name' => 'Chicago', 'slug' => 'chicago']);
$houston = City::create(['name' => 'Houston', 'slug' => 'houston']);
$phoenix = City::create(['name' => 'Phoenix', 'slug' => 'phoenix']);

// Property Types
echo "Creating property types...\n";
$apt = PropertyType::create(['name' => 'Apartment', 'slug' => 'apartment']);
$res = PropertyType::create(['name' => 'Residential', 'slug' => 'residential']);
$com = PropertyType::create(['name' => 'Commercial', 'slug' => 'commercial']);
$ind = PropertyType::create(['name' => 'Industrial', 'slug' => 'industrial']);
$land = PropertyType::create(['name' => 'Land', 'slug' => 'land']);

// Properties
echo "Creating properties...\n";
Property::create(['title' => 'Luxury Downtown Apartment', 'slug' => 'luxury-downtown-apartment', 'price' => 750000, 'bedrooms' => 3, 'bathrooms' => 2, 'area' => 2500, 'is_featured' => 1, 'city_id' => $nyc->id, 'property_type_id' => $apt->id, 'purpose' => 'sale', 'description' => 'Beautiful luxury apartment in downtown', 'featured_image' => 'apt1.jpg']);
Property::create(['title' => 'Beachfront Villa', 'slug' => 'beachfront-villa', 'price' => 1200000, 'bedrooms' => 4, 'bathrooms' => 3, 'area' => 4200, 'is_featured' => 1, 'city_id' => $la->id, 'property_type_id' => $res->id, 'purpose' => 'sale', 'description' => 'Stunning beachfront villa', 'featured_image' => 'villa1.jpg']);
Property::create(['title' => 'Modern Tech Hub Office', 'slug' => 'modern-tech-hub-office', 'price' => 2500000, 'bedrooms' => 0, 'bathrooms' => 5, 'area' => 15000, 'is_featured' => 1, 'city_id' => $chicago->id, 'property_type_id' => $com->id, 'purpose' => 'rent', 'description' => 'State-of-the-art commercial office', 'featured_image' => 'office1.jpg']);
Property::create(['title' => 'Urban Loft', 'slug' => 'urban-loft', 'price' => 450000, 'bedrooms' => 2, 'bathrooms' => 1, 'area' => 1800, 'is_featured' => 1, 'city_id' => $nyc->id, 'property_type_id' => $apt->id, 'purpose' => 'sale', 'description' => 'Trendy urban loft', 'featured_image' => 'loft1.jpg']);
Property::create(['title' => 'Spacious Family Home', 'slug' => 'spacious-family-home', 'price' => 650000, 'bedrooms' => 5, 'bathrooms' => 3, 'area' => 4000, 'is_featured' => 0, 'city_id' => $houston->id, 'property_type_id' => $res->id, 'purpose' => 'sale', 'description' => 'Perfect family home', 'featured_image' => 'home1.jpg']);
Property::create(['title' => 'Desert Retreat', 'slug' => 'desert-retreat', 'price' => 850000, 'bedrooms' => 4, 'bathrooms' => 4, 'area' => 5500, 'is_featured' => 0, 'city_id' => $phoenix->id, 'property_type_id' => $res->id, 'purpose' => 'sale', 'description' => 'Luxurious desert home', 'featured_image' => 'desert1.jpg']);
Property::create(['title' => 'Warehouse Conversion', 'slug' => 'warehouse-conversion', 'price' => 1800000, 'bedrooms' => 0, 'bathrooms' => 2, 'area' => 20000, 'is_featured' => 0, 'city_id' => $chicago->id, 'property_type_id' => $ind->id, 'purpose' => 'rent', 'description' => 'Spacious converted warehouse', 'featured_image' => 'warehouse1.jpg']);
Property::create(['title' => 'Vacant Land Prime Location', 'slug' => 'vacant-land-prime-location', 'price' => 500000, 'bedrooms' => 0, 'bathrooms' => 0, 'area' => 50000, 'is_featured' => 0, 'city_id' => $la->id, 'property_type_id' => $land->id, 'purpose' => 'sale', 'description' => 'Prime development land', 'featured_image' => 'land1.jpg']);
Property::create(['title' => 'Cozy Studio Apartment', 'slug' => 'cozy-studio-apartment', 'price' => 280000, 'bedrooms' => 1, 'bathrooms' => 1, 'area' => 600, 'is_featured' => 0, 'city_id' => $nyc->id, 'property_type_id' => $apt->id, 'purpose' => 'rent', 'description' => 'Charming studio apartment', 'featured_image' => 'studio1.jpg']);
Property::create(['title' => 'Executive Penthouse', 'slug' => 'executive-penthouse', 'price' => 3500000, 'bedrooms' => 5, 'bathrooms' => 4, 'area' => 8000, 'is_featured' => 1, 'city_id' => $la->id, 'property_type_id' => $apt->id, 'purpose' => 'sale', 'description' => 'Exclusive penthouse suite', 'featured_image' => 'penthouse1.jpg']);

// Market Trends
echo "Creating market trends...\n";
MarketTrend::create(['city_id' => $nyc->id, 'month' => 'January', 'year' => 2026, 'average_price' => 650000, 'price_change_percent' => 3.5]);
MarketTrend::create(['city_id' => $nyc->id, 'month' => 'February', 'year' => 2026, 'average_price' => 675000, 'price_change_percent' => 3.8]);
MarketTrend::create(['city_id' => $la->id, 'month' => 'January', 'year' => 2026, 'average_price' => 950000, 'price_change_percent' => 2.1]);
MarketTrend::create(['city_id' => $la->id, 'month' => 'February', 'year' => 2026, 'average_price' => 975000, 'price_change_percent' => 2.6]);

echo "\n✅ Database seeded successfully!\n";
