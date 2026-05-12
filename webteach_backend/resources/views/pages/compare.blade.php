@extends('layouts.app')

@section('title', 'Compare Properties')

@section('content')
    <main class="container py-5" role="main">
      <header class="text-center mb-5">
        <h1 class="fw-bold">Property Comparison Matrix</h1>
        <p class="text-muted">
          Select properties from the dropdowns below for a side-by-side analysis.
        </p>
      </header>

      @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      <!-- Property Selectors -->
      <section class="row mb-5 g-3 justify-content-center">
        @for ($i = 0; $i < 3; $i++)
          <div class="col-md-4">
            <div class="card border-0 shadow-sm p-3">
              <label class="small fw-bold mb-2">Slot {{ $i + 1 }}</label>
              <form action="{{ route('compare.add') }}" method="POST">
                @csrf
                <div class="input-group">
                  <select name="property_id" class="form-select border-0 bg-light" onchange="this.form.submit()">
                    <option value="">Select Property...</option>
                    @foreach($allProperties as $p)
                      <option value="{{ $p->id }}" {{ isset($properties[$i]) && $properties[$i]->id == $p->id ? 'selected' : '' }}>
                        {{ $p->title }} ({{ $p->city->name ?? 'N/A' }})
                      </option>
                    @endforeach
                  </select>
                </div>
              </form>
              @if(isset($properties[$i]))
                <form action="{{ route('compare.remove', $properties[$i]->id) }}" method="POST" class="mt-2 text-end">
                  @csrf
                  <button type="submit" class="btn btn-link btn-sm text-danger text-decoration-none p-0">
                    <i class="fas fa-times-circle"></i> Clear Slot
                  </button>
                </form>
              @endif
            </div>
          </div>
        @endfor
      </section>

      <section aria-labelledby="comparison-table-heading">
        <h2 id="comparison-table-heading" class="visually-hidden">
          Property Comparison Table
        </h2>
        
        @if($properties->count() > 0)
        <div class="table-responsive shadow-sm rounded-4 bg-white p-4">
          <table class="table table-hover align-middle mb-0" role="table">
            <thead class="table-light">
              <tr>
                <th class="py-3 px-4" style="width: 25%">Features</th>
                @foreach($properties as $property)
                <th style="width: {{ 75 / $properties->count() }}%">
                  <div class="d-flex align-items-center">
                    @php
                      $placeholders = ['p1.jpg', 'p2.jpg', 'penthouse.png', 'plaza.png', 'studioapartment.png', 'Farmhouse.png'];
                      $imagePath = 'images/' . $placeholders[$property->id % count($placeholders)];
                      if ($property->featured_image && file_exists(public_path('images/' . $property->featured_image))) {
                          $imagePath = 'images/' . $property->featured_image;
                      }
                    @endphp
                    <img
                      src="{{ asset($imagePath) }}"
                      class="rounded me-2"
                      alt="{{ $property->title }}"
                      style="width: 40px; height: 40px; object-fit: cover;"
                    />
                    <span class="text-truncate" style="max-width: 150px;">{{ $property->title }}</span>
                  </div>
                </th>
                @endforeach
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="px-4 fw-bold text-muted small uppercase">Price</td>
                @foreach($properties as $property)
                <td class="text-primary fw-bold">PKR {{ number_format($property->price) }}</td>
                @endforeach
              </tr>
              <tr>
                <td class="px-4 fw-bold text-muted small uppercase">Location</td>
                @foreach($properties as $property)
                <td>{{ $property->city->name ?? 'N/A' }}</td>
                @endforeach
              </tr>
              <tr>
                <td class="px-4 fw-bold text-muted small uppercase">Area Size</td>
                @foreach($properties as $property)
                <td>{{ number_format($property->area) }} sqft</td>
                @endforeach
              </tr>
              <tr>
                <td class="px-4 fw-bold text-muted small uppercase">Layout</td>
                @foreach($properties as $property)
                <td>{{ $property->bedrooms ?: '-' }} Bed / {{ $property->bathrooms ?: '-' }} Bath</td>
                @endforeach
              </tr>
              <tr>
                <td class="px-4 fw-bold text-muted small uppercase">Type</td>
                @foreach($properties as $property)
                <td><span class="badge bg-light text-dark">{{ $property->type->name ?? 'N/A' }}</span></td>
                @endforeach
              </tr>
              <tr>
                <td class="px-4 fw-bold text-muted small uppercase">Status</td>
                @foreach($properties as $property)
                <td><span class="badge bg-success bg-opacity-10 text-success">Verified</span></td>
                @endforeach
              </tr>
              <tr>
                <td class="px-4 fw-bold text-muted small uppercase">Action</td>
                @foreach($properties as $property)
                <td>
                  <a href="{{ route('property.show', $property->slug) }}" class="btn btn-sm btn-primary w-100">Details</a>
                </td>
                @endforeach
              </tr>
            </tbody>
          </table>
        </div>
        @else
        <div class="text-center py-5">
            <i class="fas fa-exchange-alt fa-3x text-light mb-3"></i>
            <h4 class="fw-bold">No Properties Selected</h4>
            <p class="text-muted">Use the selectors above to choose properties for side-by-side analysis.</p>
        </div>
        @endif
      </section>
    </main>
@endsection