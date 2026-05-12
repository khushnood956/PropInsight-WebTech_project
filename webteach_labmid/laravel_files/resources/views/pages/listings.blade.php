@extends('layouts.app')

@section('title', 'Property Listings')

@section('content')
<div class="container py-5">
  <div class="row">
    <aside class="col-lg-3 mb-4" role="complementary">
      <div class="card border-0 shadow-sm p-4">
        <h5 class="fw-bold mb-4">Filters</h5>
        <form action="{{ route('listings.index') }}" method="GET" aria-label="Property filters">
          
          <div class="mb-3">
            <label for="locationFilter" class="form-label small fw-bold">Location</label>
            <select id="locationFilter" name="city" class="form-select border-0 bg-light">
              <option value="">All Cities</option>
              @foreach($cities as $city)
                <option value="{{ $city->slug }}" {{ request('city') == $city->slug ? 'selected' : '' }}>
                  {{ $city->name }}
                </option>
              @endforeach
            </select>
          </div>

          <div class="mb-3">
            <label for="typeFilter" class="form-label small fw-bold">Property Type</label>
            <select id="typeFilter" name="type" class="form-select border-0 bg-light">
              <option value="">All Types</option>
              @foreach($types as $type)
                <option value="{{ $type->slug }}" {{ request('type') == $type->slug ? 'selected' : '' }}>
                  {{ $type->name }}
                </option>
              @endforeach
            </select>
          </div>

          <div class="mb-3">
             <label class="form-label small fw-bold">From Price (PKR)</label>
             <input type="number" name="min_price" value="{{ request('min_price') }}" class="form-control" placeholder="1000000">
          </div>

          <div class="mb-3">
             <label class="form-label small fw-bold">To Price (PKR)</label>
             <input type="number" name="max_price" value="{{ request('max_price') }}" class="form-control" placeholder="50000000">
          </div>

          <button type="submit" class="btn btn-primary w-100 mt-3">Apply Filters</button>
          
          @if(request()->hasAny(['city', 'type', 'min_price', 'max_price', 'search']))
              <a href="{{ route('listings.index') }}" class="btn btn-outline-secondary w-100 mt-2">Clear Filters</a>
          @endif
        </form>
      </div>
    </aside>

    <main class="col-lg-9" role="main">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold mb-0">Property Inventory</h1>
        <span class="text-muted small">Showing {{ $properties->total() }} Properties</span>
      </div>

      <div class="row g-4">
        @forelse($properties as $property)
          <article class="col-md-6">
            <div class="card prop-card shadow-sm h-100 border-0">
              <div class="badge-container position-relative">
                <img src="{{ asset('images/' . $property->featured_image) }}" class="card-img-top" alt="{{ $property->title }}" />
                @if($property->is_featured)
                  <span class="badge bg-warning text-dark position-absolute top-0 end-0 m-3">Hot Deal</span>
                @endif
              </div>
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-2">
                  <h5 class="fw-bold">{{ $property->title }}</h5>
                  <span class="text-primary fw-bold">PKR {{ number_format($property->price) }}</span>
                </div>
                <p class="text-muted small mb-3">{{ $property->city->name }}</p>

                <div class="d-flex justify-content-between small text-muted mb-3 border-top pt-3">
                  <span><i class="fas fa-bed"></i> {{ $property->bedrooms ?? '-' }} Bed</span>
                  <span><i class="fas fa-bath"></i> {{ $property->bathrooms ?? '-' }} Bath</span>
                  <span><i class="fas fa-ruler-combined"></i> {{ $property->area }} sqft</span>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-3">
                  <span class="small text-success fw-bold">Purpose: {{ ucfirst($property->purpose) }}</span>
                  <div class="btn-group">
                    <a href="{{ route('property.show', $property->slug) }}" class="btn btn-outline-dark btn-sm">Details</a>
                    <a href="{{ route('compare') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Compare</a>
                  </div>
                </div>
              </div>
            </div>
          </article>
        @empty
          <div class="col-12 text-center py-5">
              <h4 class="text-muted">No properties found matching your criteria.</h4>
          </div>
        @endforelse
      </div>

      <div class="d-flex justify-content-center mt-5">
          {{ $properties->links('pagination::bootstrap-5') }}
      </div>

    </main>
  </div>
</div>
@endsection