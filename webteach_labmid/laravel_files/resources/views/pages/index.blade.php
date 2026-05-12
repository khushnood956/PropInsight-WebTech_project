@extends('layouts.app')

@section('title', 'Home Dashboard')

@section('content')
<header class="hero-section bg-white" role="banner">
    <div class="container py-5">
        <div class="row align-items-center">
        <div class="col-lg-6">
            <h1 class="display-5 fw-bold text-dark">Data-Driven <span class="text-primary">Real Estate</span></h1>
            <p class="lead text-muted mb-4">Analyze property values, market trends, and investment risks using our mid-project analytics engine.</p>
            
            <div class="search-box p-2 shadow-sm border rounded-3 bg-light" role="search">
            <form action="{{ route('listings.index') }}" method="GET" class="row g-0">
                <div class="col-8">
                <input type="text" name="search" class="form-control border-0 bg-transparent" placeholder="Search City or Area..."/>
                </div>
                <div class="col-4">
                <button type="submit" class="btn btn-primary w-100">Search</button>
                </div>
            </form>
            </div>
        </div>
        <div class="col-lg-6 d-none d-lg-block text-end">
            <img src="{{ asset('images/Data-Driven.png') }}" alt="Real Estate Analytics Dashboard" class="img-fluid rounded-4 shadow" />
        </div>
        </div>
    </div>
</header>

<main class="container py-5" role="main">
    <section aria-labelledby="trending-heading">
        <div class="d-flex justify-content-between align-items-end mb-4">
            <h2 id="trending-heading" class="fw-bold">Trending Now</h2>
            <a href="{{ route('listings.index') }}" class="text-primary text-decoration-none fw-bold">View All Listings →</a>
        </div>

        <div class="row g-4">
            @foreach($featuredProperties as $property)
            <article class="col-md-4">
                <div class="card h-100 prop-card shadow-sm border-0">
                    <div class="badge-container position-relative">
                        <img src="{{ asset('images/' . $property->featured_image) }}" class="card-img-top" alt="{{ $property->title }}" />
                        <span class="badge bg-success position-absolute top-0 start-0 m-3">Verified</span>
                        <span class="badge bg-warning text-dark position-absolute top-0 end-0 m-3">Hot Deal</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $property->title }}</h5>
                        <p class="text-primary fw-bold mb-1">PKR {{ number_format($property->price) }}</p>
                        <p class="small text-muted mb-2">{{ $property->city->name ?? 'Unknown Location' }}</p>

                        <div class="d-flex justify-content-between border-top pt-3 mt-3 small text-muted">
                        <span><i class="fas fa-bed"></i> {{ $property->bedrooms ?? '-' }} Bed</span>
                        <span><i class="fas fa-bath"></i> {{ $property->bathrooms ?? '-' }} Bath</span>
                        <span><i class="fas fa-ruler-combined"></i> {{ $property->area }} sqft</span>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-0 pb-3">
                        <a href="{{ route('property.show', $property->slug) }}" class="btn btn-outline-dark w-100">Analyze Data</a>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
    </section>
</main>
@endsection