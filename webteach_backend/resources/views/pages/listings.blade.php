<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Property Listings | PropInsight</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body class="bg-light">
    <div
      id="market-ticker"
      class="bg-primary text-white text-center py-1 small fw-bold"
    >
      Market Feed Initializing...
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
      <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}"
          >PROP<span class="text-primary">INSIGHT</span></a
        >
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="{{ route('listings.index') }}">Listings</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('compare') }}">Compare</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('calculator') }}">Calculator</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('map') }}">Map</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

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
                    <input type="number" name="min_price" class="form-control border-0 bg-light small" placeholder="Min" value="{{ request('min_price') }}">
                  </div>
                  <div class="col-6">
                    <input type="number" name="max_price" class="form-control border-0 bg-light small" placeholder="Max" value="{{ request('max_price') }}">
                  </div>
                </div>
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
                      <a href="{{ route('compare') }}" class="btn btn-primary btn-sm px-3">Compare</a>
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

    <footer class="bg-dark text-white py-4 mt-5 text-center" role="contentinfo">
      <div class="container">
        <p class="mb-0">PropInsight&trade; All Rights Reserved.</p>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>


