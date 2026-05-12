@extends('layouts.app')

@section('title', 'Property Details')

@section('content')
<main class="container py-5">
    <div class="row mb-4">
        <div class="col-12">
            <a href="{{ route('listings.index') }}" class="text-decoration-none"><i class="fas fa-arrow-left me-2"></i> Back to Listings</a>
        </div>
    </div>

    <div class="row">
        <!-- Main Image -->
        <div class="col-lg-8 mb-4">
            <img src="{{ asset('images/' . $property->featured_image) }}" class="img-fluid rounded-4 w-100 shadow-sm" alt="{{ $property->title }}">
        </div>

        <!-- Property Info -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm p-4 h-100">
                <span class="badge bg-primary mb-2 w-25">{{ $property->type->name }}</span>
                <h1 class="fw-bold mb-1">{{ $property->title }}</h1>
                <p class="text-muted">{{ $property->city->name }}</p>
                
                <h2 class="text-primary fw-bold mb-4">PKR {{ number_format($property->price) }}</h2>

                <div class="row g-3 mb-4 text-center">
                    <div class="col-4">
                        <div class="bg-light p-3 rounded">
                            <i class="fas fa-bed fa-2x text-muted mb-2"></i>
                            <div class="fw-bold">{{ $property->bedrooms ?? '-' }}</div>
                            <small class="text-muted">Beds</small>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="bg-light p-3 rounded">
                            <i class="fas fa-bath fa-2x text-muted mb-2"></i>
                            <div class="fw-bold">{{ $property->bathrooms ?? '-' }}</div>
                            <small class="text-muted">Baths</small>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="bg-light p-3 rounded">
                            <i class="fas fa-ruler-combined fa-2x text-muted mb-2"></i>
                            <div class="fw-bold">{{ $property->area }}</div>
                            <small class="text-muted">SqFt</small>
                        </div>
                    </div>
                </div>

                <h5 class="fw-bold mt-2">Description</h5>
                <p class="text-muted">{{ $property->description }}</p>

                <div class="mt-auto pt-3">
                    <a href="{{ route('calculator') }}" class="btn btn-outline-primary w-100 mb-2">Calculate Mortgage</a>
                    <button class="btn btn-primary w-100">Contact Agent</button>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection