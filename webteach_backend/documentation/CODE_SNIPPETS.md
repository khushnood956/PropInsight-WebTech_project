# PropInsight Technical Code Snippets

This document contains the primary technical implementations and algorithms used in the PropInsight platform.

## 1. Mortgage & ROI Calculation Logic
*Location: `app/Http/Controllers/CalculatorController.php`*

The system uses the standard amortization formula to calculate monthly installments and projects ROI based on a 5% annual appreciation/rental yield.

```php
public function calculate(Request $request) {
    $request->validate([
        'price' => 'required|numeric|min:100000',
        'down_payment' => 'required|numeric|min:0|max:100',
        'tenure' => 'required|integer|min:1|max:25',
        'interest_rate' => 'required|numeric|min:0|max:30',
    ]);

    $price = $request->input('price');
    $downPaymentAmount = $price * ($request->input('down_payment') / 100);
    $loanAmount = $price - $downPaymentAmount;
    
    $totalMonths = $request->input('tenure') * 12;
    $monthlyRate = $request->input('interest_rate') / 100 / 12;

    if ($monthlyRate == 0) {
        $monthlyInstallment = $loanAmount / $totalMonths;
    } else {
        // Standard Mortgage Amortization Formula
        $monthlyInstallment = ($loanAmount * $monthlyRate) / (1 - pow(1 + $monthlyRate, -$totalMonths));
    }

    // ROI Projection (Assumed 5% annual property growth/rental)
    $annualIncome = $price * 0.05;
    $roi = ($price > 0) ? ($annualIncome / $price) * 100 : 0;
}
```

## 2. Advanced Filtering & Search Engine
*Location: `app/Http/Controllers/PropertyController.php`*

The search engine utilizes a dynamic query builder to handle multiple optional parameters including Price Range validation (Max > Min).

```php
public function index(Request $request) {
    $request->validate([
        'min_price' => 'nullable|numeric|min:0',
        'max_price' => 'nullable|numeric|gt:min_price',
    ]);

    $query = Property::with(['city', 'type']);

    // Dynamic Filter Binding
    if ($request->filled('city')) {
        $query->whereHas('city', fn($q) => $q->where('slug', $request->city));
    }
    
    if ($request->filled('type')) {
        $query->whereHas('type', fn($q) => $q->where('slug', $request->type));
    }

    if ($request->filled('search')) {
        $query->where('title', 'like', '%' . $request->search . '%')
              ->orWhere('description', 'like', '%' . $request->search . '%');
    }

    $properties = $query->paginate(9)->withQueryString();
}
```

## 3. Session-Based Comparison Management
*Location: `app/Http/Controllers/CompareController.php`*

Manages the side-by-side comparison matrix using Laravel's session store to persist user selections.

```php
public function add(Request $request) {
    $propertyId = $request->input('property_id');
    $compareIds = session()->get('compare_properties', []);
    
    if (!in_array($propertyId, $compareIds)) {
        // Enforce 3-slot maximum limit
        if (count($compareIds) >= 3) {
            array_shift($compareIds);
        }
        $compareIds[] = $propertyId;
        session()->put('compare_properties', $compareIds);
    }
    
    return redirect()->route('compare');
}
```

## 4. Deterministic Image Fallback System
*Location: `resources/views/pages/listings.blade.php`*

Ensures every property card has a valid image by checking for custom uploads and defaulting to a rotation of verified placeholders based on index.

```php
@php
    $placeholders = ['p1.jpg', 'p2.jpg', 'penthouse.png', 'plaza.png', 'studioapartment.png', 'Farmhouse.png'];
    // Use modulo to cycle through placeholders deterministically
    $imagePath = 'images/' . $placeholders[$loop->index % count($placeholders)];
    
    // Check if property-specific image exists in public storage
    if ($property->featured_image && file_exists(public_path('images/' . $property->featured_image))) {
        $imagePath = 'images/' . $property->featured_image;
    }
@endphp
<img src="{{ asset($imagePath) }}" class="card-img-top" alt="{{ $property->title }}" />
```

## 5. Active Navigation State Logic
*Location: `resources/views/layouts/app.blade.php`*

Implements a centralized navigation logic that automatically highlights the active link based on the named route.

```html
<ul class="navbar-nav ms-auto">
    <li class="nav-item">
        <a class="nav-link {{ Route::is('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Route::is('listings.*') ? 'active' : '' }}" href="{{ route('listings.index') }}">Listings</a>
    </li>
</ul>
```

---
*Technical Snippets Documentation | PropInsight Midterm Report Support*
