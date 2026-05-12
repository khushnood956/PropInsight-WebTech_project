@extends('layouts.app')

@section('title', 'Property Listings')

@section('content')
    <div class="container py-5">
      <div class="row">
        <aside class="col-lg-3 mb-4" role="complementary">
          <div class="card border-0 shadow-sm p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
              <h5 class="fw-bold mb-0">Filters</h5>
              <a href="{{ route('listings.index') }}" class="text-decoration-none small">Reset</a>
            </div>
            <form action="{{ route('listings.index') }}" method="GET" aria-label="Property filters">
              <div class="mb-3">
                <label for="search" class="form-label small fw-bold">Search</label>
                <input type="text" name="search" id="search" class="form-control border-0 bg-light" placeholder="Keyword..." value="{{ request('search') }}">
              </div>
              <div class="mb-3">
                <label for="city" class="form-label small fw-bold">Location</label>
                <select name="city" id="city" class="form-select border-0 bg-light">
                  <option value="">All Cities</option>
                  @foreach($cities as $city)
                    <option value="{{ $city->slug }}" {{ request('city') == $city->slug ? 'selected' : '' }}>{{ $city->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="mb-3">
                <label for="type" class="form-label small fw-bold">Property Type</label>
                <select name="type" id="type" class="form-select border-0 bg-light">
                  <option value="">All Types</option>
                  @foreach($types as $type)
                    <option value="{{ $type->slug }}" {{ request('type') == $type->slug ? 'selected' : '' }}>{{ $type->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label small fw-bold">Price Range (PKR)</label>
                <div class="row g-2">
                  <div class="col-6">
                    <input type="number" name="min_price" class="form-control border-0 bg-light small @error('min_price') is-invalid @enderror" placeholder="Min" value="{{ request('min_price') }}">
                  </div>
                  <div class="col-6">
                    <input type="number" name="max_price" class="form-control border-0 bg-light small @error('max_price') is-invalid @enderror" placeholder="Max" value="{{ request('max_price') }}">
                  </div>
                </div>
                @error('max_price')
                  <div class="text-danger extra-small mt-1">{{ $message }}</div>
                @enderror
                @error('min_price')
                  <div class="text-danger extra-small mt-1">{{ $message }}</div>
                @enderror
              </div>
              
              <button type="submit" class="btn btn-primary w-100 mt-3">
                Apply Filters
              </button>
            </form>
          </div>
        </aside>

        <main class="col-lg-9" role="main">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
              <h1 class="fw-bold mb-0">Property Inventory</h1>
              <p class="text-muted small mb-0">Discover your dream home from our verified listings</p>
            </div>
            <span class="badge bg-white text-dark shadow-sm py-2 px-3 border">
              Showing {{ $properties->firstItem() ?? 0 }} - {{ $properties->lastItem() ?? 0 }} of {{ $properties->total() }}
            </span>
          </div>

          <div class="row g-4">
            @forelse($properties as $property)
            <article class="col-md-6">
              <div class="card prop-card shadow-sm h-100 border-0 overflow-hidden">
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
                  <div class="position-absolute top-0 start-0 m-3 d-flex gap-2">
                    <span class="badge bg-primary">Featured</span>
                    <span class="badge bg-success">Verified</span>
                  </div>
                  <span class="price-tag position-absolute bottom-0 end-0 m-3 badge bg-dark fs-6 py-2 px-3">
                    PKR {{ number_format($property->price / 1000000, 1) }}M
                  </span>
                </div>
                <div class="card-body p-4">
                  <div class="mb-2">
                    <span class="text-primary small fw-bold text-uppercase">{{ $property->type->name ?? 'Property' }}</span>
                  </div>
                  <h5 class="fw-bold mb-1">{{ $property->title }}</h5>
                  <p class="text-muted small mb-3">
                    <i class="fas fa-map-marker-alt me-1 text-danger"></i> {{ $property->city->name ?? 'Location' }}
                  </p>

                  <div class="d-flex justify-content-between border-top border-bottom py-3 mb-3">
                    <div class="text-center">
                      <div class="small fw-bold">{{ $property->bedrooms }}</div>
                      <div class="text-muted extra-small">Beds</div>
                    </div>
                    <div class="text-center">
                      <div class="small fw-bold">{{ $property->bathrooms }}</div>
                      <div class="text-muted extra-small">Baths</div>
                    </div>
                    <div class="text-center">
                      <div class="small fw-bold">{{ number_format($property->area) }}</div>
                      <div class="text-muted extra-small">Sq. Ft.</div>
                    </div>
                  </div>

                  <div class="d-flex justify-content-between align-items-center">
                    <span class="small text-muted">Posted {{ $property->created_at->diffForHumans() }}</span>
                    <div class="btn-group">
                      <a href="{{ route('property.show', ['slug' => $property->slug]) }}" class="btn btn-outline-primary btn-sm px-3">View</a>
                      <form action="{{ route('compare.add') }}" method="POST" class="m-0 p-0 d-inline">
                        @csrf
                        <input type="hidden" name="property_id" value="{{ $property->id }}">
                        <button type="submit" class="btn btn-primary btn-sm px-3" style="border-top-left-radius: 0; border-bottom-left-radius: 0;">Compare</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </article>
            @empty
            <div class="col-12">
              <div class="card border-0 shadow-sm p-5 text-center">
                <i class="fas fa-search fa-3x text-light mb-3"></i>
                <h4 class="fw-bold">No Properties Found</h4>
                <p class="text-muted">We couldn't find any properties matching your current filters.</p>
                <div class="mt-2">
                  <a href="{{ route('listings.index') }}" class="btn btn-primary">Clear All Filters</a>
                </div>
              </div>
            </div>
            @endforelse
          </div>

          <!-- Pagination -->
          <div class="mt-5 d-flex justify-content-center">
            {{ $properties->links('pagination::bootstrap-5') }}
          </div>
        </main>
      </div>
    </div>
@endsection