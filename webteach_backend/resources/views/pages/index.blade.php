@extends('layouts.app')

@section('title', 'Real Estate Analytics')

@section('content')
    <header class="hero-section bg-white" role="banner">
      <div class="container py-5">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <h1 class="display-5 fw-bold text-dark">
              Data-Driven <span class="text-primary">Real Estate</span>
            </h1>
            <p class="lead text-muted mb-4">
              Analyze property values, market trends, and investment risks using
              our mid-project analytics engine.
            </p>

            <div
              class="search-box p-3 shadow border rounded-4 bg-white"
              role="search"
            >
              <form action="{{ route('listings.index') }}" method="GET" class="row g-2" aria-label="Property search">
                <div class="col-md-5">
                  <label for="search" class="small fw-bold text-muted mb-1 ms-1">Keyword</label>
                  <input
                    type="text"
                    name="search"
                    id="search"
                    class="form-control border-0 bg-light"
                    placeholder="E.g. Luxury, Modern..."
                  />
                </div>
                <div class="col-md-4">
                  <label for="city" class="small fw-bold text-muted mb-1 ms-1">City</label>
                  <select name="city" id="city" class="form-select border-0 bg-light">
                    <option value="">All Cities</option>
                    @foreach($cities as $city)
                      <option value="{{ $city->slug }}">{{ $city->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-3 d-flex align-items-end">
                  <button
                    type="submit"
                    class="btn btn-primary w-100 py-2 fw-bold"
                  >
                    <i class="fas fa-search me-2"></i>Search
                  </button>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-6 d-none d-lg-block text-end">
            <!-- Add actual analytics dashboard screenshot -->
            <img
              src="{{ asset('images/Data-Driven.png') }}"
              alt="Real Estate Analytics Dashboard"
              class="img-fluid rounded-4 shadow-lg"
              style="max-height: 450px;"
            />
          </div>
        </div>
      </div>
    </header>

    <main class="container py-5" role="main">
      <section aria-labelledby="trending-heading">
        <div class="d-flex justify-content-between align-items-end mb-4">
          <div>
            <h2 id="trending-heading" class="fw-bold mb-1">Featured Properties</h2>
            <p class="text-muted small mb-0">Our hand-picked premium listings for you</p>
          </div>
          <a
            href="{{ route('listings.index') }}"
            class="text-primary text-decoration-none fw-bold small"
            >View All Listings <i class="fas fa-arrow-right ms-1"></i></a
          >
        </div>

        <div class="row g-4">
          @forelse($featuredProperties as $property)
          <article class="col-md-4">
            <div class="card h-100 prop-card shadow-sm border-0 overflow-hidden">
              <div class="badge-container position-relative">
                @php
                  $placeholders = ['p1.jpg', 'p2.jpg', 'penthouse.png', 'plaza.png', 'studioapartment.png', 'Farmhouse.png'];
                  $imagePath = 'images/' . $placeholders[$loop->index % count($placeholders)];
                  if ($property->featured_image && file_exists(public_path('images/' . $property->featured_image))) {
                      $imagePath = 'images/' . $property->featured_image;
                  }
                @endphp
                <img
                  src="{{ asset($imagePath) }}"
                  class="card-img-top"
                  alt="{{ $property->title }}"
                />
                <span class="badge bg-success position-absolute top-0 start-0 m-3">Verified</span>
                @if($property->is_featured)
                  <span class="badge bg-primary position-absolute top-0 end-0 m-3">Featured</span>
                @endif
              </div>
              <div class="card-body p-4">
                <div class="mb-2">
                  <span class="text-primary extra-small fw-bold">{{ $property->type->name ?? 'Property' }}</span>
                </div>
                <h5 class="fw-bold mb-1 text-truncate">{{ $property->title }}</h5>
                <p class="text-muted small mb-3">
                  <i class="fas fa-map-marker-alt text-danger me-1"></i> {{ $property->city->name ?? 'Location' }}
                </p>

                <div class="d-flex justify-content-between border-top border-bottom py-3 mb-3">
                    <div class="text-center">
                      <div class="small fw-bold">{{ $property->bedrooms }}</div>
                      <div class="text-muted extra-small" style="font-size: 0.6rem;">Beds</div>
                    </div>
                    <div class="text-center">
                      <div class="small fw-bold">{{ $property->bathrooms }}</div>
                      <div class="text-muted extra-small" style="font-size: 0.6rem;">Baths</div>
                    </div>
                    <div class="text-center">
                      <div class="small fw-bold">{{ number_format($property->area) }}</div>
                      <div class="text-muted extra-small" style="font-size: 0.6rem;">Sq. Ft.</div>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                  <span class="fw-bold text-dark">PKR {{ number_format($property->price / 1000000, 1) }}M</span>
                  <a href="{{ route('property.show', ['slug' => $property->slug]) }}" class="btn btn-outline-primary btn-sm px-3">Details</a>
                </div>
              </div>
            </div>
          </article>
          @empty
          <div class="col-12">
            <div class="alert alert-info text-center">No featured properties available at the moment.</div>
          </div>
          @endforelse
        </div>
      </section>

      <!-- Market Insights Section -->
      <section class="mt-5 pt-5" aria-labelledby="insights-heading">
        <h2 id="insights-heading" class="fw-bold mb-4">Market Insights</h2>
        <div class="row g-4">
          <div class="col-md-3">
            <div class="card text-center border-0 shadow-sm">
              <div class="card-body">
                <h3 class="text-primary fw-bold">8.2%</h3>
                <p class="small text-muted mb-0">Annual Growth</p>
                <p class="small text-success">+2.1% vs last year</p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card text-center border-0 shadow-sm">
              <div class="card-body">
                <h3 class="text-primary fw-bold">245</h3>
                <p class="small text-muted mb-0">Active Listings</p>
                <p class="small text-success">+18 this week</p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card text-center border-0 shadow-sm">
              <div class="card-body">
                <h3 class="text-primary fw-bold">PKR 15.2L</h3>
                <p class="small text-muted mb-0">Avg. Price/sqft</p>
                <p class="small text-warning">Stable</p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card text-center border-0 shadow-sm">
              <div class="card-body">
                <h3 class="text-primary fw-bold">32</h3>
                <p class="small text-muted mb-0">Days on Market</p>
                <p class="small text-danger">-5 days vs avg</p>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
@endsection