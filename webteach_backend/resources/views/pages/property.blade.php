@extends('layouts.app')

@section('title', $property->title . ' | Property Analysis')

@section('content')
    <main class="container py-5" role="main">
      <div class="row g-4">
        <div class="col-lg-8">
          @if(session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
          @endif
          
          <article class="card border-0 shadow-sm overflow-hidden mb-4">
            <div class="position-relative">
              @php
                $placeholders = ['p1.jpg', 'p2.jpg', 'penthouse.png', 'plaza.png', 'studioapartment.png', 'Farmhouse.png'];
                $imagePath = 'images/' . $placeholders[$property->id % count($placeholders)];
                if ($property->featured_image && file_exists(public_path('images/' . $property->featured_image))) {
                    $imagePath = 'images/' . $property->featured_image;
                }
              @endphp
              <img
                src="{{ asset($imagePath) }}"
                class="card-img-top"
                alt="{{ $property->title }}"
                style="height: 450px; object-fit: cover"
              />
              <div class="position-absolute top-0 start-0 m-3">
                <span class="badge bg-success">Verified</span>
                @if($property->is_featured)
                  <span class="badge bg-warning text-dark ms-2">Hot Deal</span>
                @endif
              </div>
              <div class="position-absolute bottom-0 end-0 m-3 d-flex">
                <button
                  class="btn btn-light btn-sm"
                  aria-label="Add to favorites"
                >
                  <i class="far fa-heart"></i>
                </button>
                <form action="{{ route('compare.add') }}" method="POST" class="ms-2">
                  @csrf
                  <input type="hidden" name="property_id" value="{{ $property->id }}">
                  <button type="submit" class="btn btn-primary btn-sm" aria-label="Compare property">
                    <i class="fas fa-exchange-alt"></i> Compare
                  </button>
                </form>
              </div>
            </div>
            <div class="card-body p-4">
              <div
                class="d-flex justify-content-between align-items-center mb-3"
              >
                <h1 class="fw-bold mb-0">{{ $property->title }}</h1>
                <span class="badge bg-success py-2 px-3">Available</span>
              </div>
              <p class="text-muted mb-4">
                <i class="fas fa-map-marker-alt me-2"></i>{{ $property->city->name ?? 'Unknown' }}, Pakistan
              </p>

              <div class="mb-4">
                <span class="badge bg-light text-dark me-1">{{ $property->type->name ?? 'Property' }}</span>
                <span class="badge bg-light text-dark me-1">Gated Community</span>
                <span class="badge bg-light text-dark me-1">Possession Ready</span>
                <span class="badge bg-light text-dark">Prime Location</span>
              </div>

              <section>
                <h5 class="fw-bold mb-3">
                  <i class="fas fa-chart-line me-2"></i>Market Analysis
                </h5>
                <p class="mb-3">
                  {{ $property->description ?? 'This property is identified as a High-Yield Asset. Our analytics show a steady appreciation in this sector. By requesting the full report, you will gain access to heatmaps and historical price trends on our interactive map.' }}
                </p>

                <div class="row g-3 mb-4">
                  <div class="col-md-3 text-center">
                    <div class="bg-success bg-opacity-10 rounded p-3">
                      <i class="fas fa-trending-up text-success fa-2x mb-2"></i>
                      <div class="fw-bold text-success">+8.4%</div>
                      <small class="text-muted">Annual Growth</small>
                    </div>
                  </div>
                  <div class="col-md-3 text-center">
                    <div class="bg-primary bg-opacity-10 rounded p-3">
                      <i
                        class="fas fa-calendar-check text-primary fa-2x mb-2"
                      ></i>
                      <div class="fw-bold text-primary">Ready</div>
                      <small class="text-muted">Possession</small>
                    </div>
                  </div>
                  <div class="col-md-3 text-center">
                    <div class="bg-warning bg-opacity-10 rounded p-3">
                      <i class="fas fa-shield-alt text-warning fa-2x mb-2"></i>
                      <div class="fw-bold text-warning">LDA</div>
                      <small class="text-muted">Approved</small>
                    </div>
                  </div>
                  <div class="col-md-3 text-center">
                    <div class="bg-info bg-opacity-10 rounded p-3">
                      <i class="fas fa-home text-info fa-2x mb-2"></i>
                      <div class="fw-bold text-info">A+</div>
                      <small class="text-muted">Construction</small>
                    </div>
                  </div>
                </div>
              </section>
            </div>
          </article>

          <section class="card border-0 shadow-sm p-4">
            <h5 class="fw-bold mb-4">
              <i class="fas fa-list-alt me-2"></i>Technical Specifications
            </h5>
            <div class="row">
              <div class="col-md-6">
                <table class="table table-hover border mb-4">
                  <tbody class="small">
                    <tr>
                      <td class="fw-bold bg-light" style="width: 40%">
                        Property ID
                      </td>
                      <td>#PI-{{ str_pad($property->id, 4, '0', STR_PAD_LEFT) }}</td>
                    </tr>
                    <tr>
                      <td class="fw-bold bg-light">Property Type</td>
                      <td>{{ $property->type->name ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                      <td class="fw-bold bg-light">Valuation</td>
                      <td class="text-primary fw-bold">PKR {{ number_format($property->price) }}</td>
                    </tr>
                    <tr>
                      <td class="fw-bold bg-light">Area</td>
                      <td>{{ number_format($property->area) }} sqft</td>
                    </tr>
                    <tr>
                      <td class="fw-bold bg-light">Bedrooms</td>
                      <td>{{ $property->bedrooms ?: 'N/A' }}</td>
                    </tr>
                    <tr>
                      <td class="fw-bold bg-light">Bathrooms</td>
                      <td>{{ $property->bathrooms ?: 'N/A' }}</td>
                    </tr>
                    <tr>
                      <td class="fw-bold bg-light">Purpose</td>
                      <td class="text-capitalize">{{ $property->purpose }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="col-md-6">
                <table class="table table-hover border">
                  <tbody class="small">
                    <tr>
                      <td class="fw-bold bg-light" style="width: 40%">
                        Development Status
                      </td>
                      <td>
                        <span class="badge bg-success">Ready</span>
                      </td>
                    </tr>
                    <tr>
                      <td class="fw-bold bg-light">Payment Plan</td>
                      <td>Full Payment</td>
                    </tr>
                    <tr>
                      <td class="fw-bold bg-light">Projected ROI</td>
                      <td class="text-success fw-bold">8.4% Annually</td>
                    </tr>
                    <tr>
                      <td class="fw-bold bg-light">Rental Yield</td>
                      <td class="text-info fw-bold">6-7% Monthly</td>
                    </tr>
                    <tr>
                      <td class="fw-bold bg-light">Approval Authority</td>
                      <td>LDA Approved</td>
                    </tr>
                    <tr>
                      <td class="fw-bold bg-light">Utilities</td>
                      <td>
                        <i class="fas fa-check text-success"></i> All Available
                      </td>
                    </tr>
                    <tr>
                      <td class="fw-bold bg-light">Security</td>
                      <td>
                        <i class="fas fa-shield-alt text-success"></i> 24/7
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </section>

          <!-- Additional Information Sections -->
          <section class="card border-0 shadow-sm p-4 mt-4">
            <h5 class="fw-bold mb-3">
              <i class="fas fa-map-marked-alt me-2"></i>Location Advantages
            </h5>
            <div class="row">
              <div class="col-md-6">
                <ul class="small">
                  <li>
                    <i class="fas fa-check text-success me-2"></i>Prime access to main roads
                  </li>
                  <li>
                    <i class="fas fa-check text-success me-2"></i>Near Educational Institutes
                  </li>
                  <li>
                    <i class="fas fa-check text-success me-2"></i>Close to Medical Facilities
                  </li>
                </ul>
              </div>
              <div class="col-md-6">
                <ul class="small">
                  <li>
                    <i class="fas fa-check text-success me-2"></i>Walking distance to commercial area
                  </li>
                  <li>
                    <i class="fas fa-check text-success me-2"></i>Park and playground nearby
                  </li>
                  <li>
                    <i class="fas fa-check text-success me-2"></i>Gated community with security
                  </li>
                </ul>
              </div>
            </div>
          </section>

          <section class="card border-0 shadow-sm p-4 mt-4">
            <h5 class="fw-bold mb-3">
              <i class="fas fa-chart-bar me-2"></i>Investment Highlights
            </h5>
            <div class="row g-3">
              <div class="col-md-4">
                <div class="bg-light rounded p-3 text-center">
                  <h6 class="text-primary fw-bold">Price Appreciation</h6>
                  <div class="h4 text-success">+12% YoY</div>
                  <small class="text-muted">Last 12 months</small>
                </div>
              </div>
              <div class="col-md-4">
                <div class="bg-light rounded p-3 text-center">
                  <h6 class="text-primary fw-bold">Market Demand</h6>
                  <div class="h4 text-info">High</div>
                  <small class="text-muted">Area popularity</small>
                </div>
              </div>
              <div class="col-md-4">
                <div class="bg-light rounded p-3 text-center">
                  <h6 class="text-primary fw-bold">Future Potential</h6>
                  <div class="h4 text-warning">Excellent</div>
                  <small class="text-muted">5-year projection</small>
                </div>
              </div>
            </div>
          </section>
        </div>

        <aside class="col-lg-4">
          <div class="card border-0 shadow-sm rounded-4 p-4">
            <h5 class="fw-bold mb-4">
              <i class="fas fa-file-alt me-2"></i>Request Analysis
            </h5>
            <form action="{{ route('property.request', $property->slug) }}" method="POST" aria-label="Property analysis request form">
              @csrf
              <div class="mb-3">
                <label for="fullName" class="form-label small fw-bold">Full Name</label>
                <input
                  type="text"
                  name="full_name"
                  id="fullName"
                  class="form-control bg-light border-0 @error('full_name') is-invalid @enderror"
                  placeholder="Muhammad Umar"
                  value="{{ old('full_name') }}"
                  required
                />
                @error('full_name')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="email" class="form-label small fw-bold">Email</label>
                <input
                  type="email"
                  name="email"
                  id="email"
                  class="form-control bg-light border-0 @error('email') is-invalid @enderror"
                  placeholder="name@example.com"
                  value="{{ old('email') }}"
                  required
                />
                @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="phone" class="form-label small fw-bold">Phone</label>
                <input
                  type="tel"
                  name="phone"
                  id="phone"
                  class="form-control bg-light border-0 @error('phone') is-invalid @enderror"
                  placeholder="+92 300 1234567"
                  value="{{ old('phone') }}"
                />
                @error('phone')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="note" class="form-label small fw-bold">Message</label>
                <textarea
                  name="note"
                  id="note"
                  class="form-control bg-light border-0 @error('note') is-invalid @enderror"
                  rows="3"
                  placeholder="I want to see the location analytics..."
                >{{ old('note') }}</textarea>
                @error('note')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="scheduleVisit" name="schedule_visit" />
                <label class="form-check-label" for="scheduleVisit">
                  Schedule Property Visit
                </label>
              </div>

              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="mortgageInfo" name="mortgage_info" />
                <label class="form-check-label" for="mortgageInfo">
                  Send Mortgage Information
                </label>
              </div>

              <button type="submit" class="btn btn-primary w-100 fw-bold py-3 shadow-sm mb-3">
                <i class="fas fa-paper-plane me-2"></i>Request Report & View Map
              </button>

              <a href="{{ route('calculator') }}" class="btn btn-outline-primary w-100 fw-bold">
                <i class="fas fa-calculator me-2"></i>Calculate Mortgage
              </a>
            </form>

            <!-- Contact Information -->
            <div class="mt-4 pt-3 border-top">
              <h6 class="fw-bold mb-3">Quick Contact</h6>
              <div class="small">
                <div class="mb-2">
                  <i class="fas fa-phone text-primary me-2"></i>
                  <a href="tel:+923001234567" class="text-decoration-none">+92 300 1234567</a>
                </div>
                <div class="mb-2">
                  <i class="fas fa-envelope text-primary me-2"></i>
                  <a href="mailto:info@propinsight.pk" class="text-decoration-none">info@propinsight.pk</a>
                </div>
                <div class="mb-2">
                  <i class="fas fa-clock text-primary me-2"></i>
                  Mon-Sat: 9AM-7PM
                </div>
              </div>
            </div>

            <div class="mt-2 pt-3 border-top text-center">
              <p class="text-muted" style="font-size: 11px">
                <strong>PropInsight</strong> <br />
                Your only and true reliable source
              </p>
            </div>
          </div>
        </aside>
      </div>
    </main>
@endsection