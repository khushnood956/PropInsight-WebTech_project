<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Property Analysis | PropInsight</title>
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
              <a class="nav-link" href="{{ route('listings.index') }}">Listings</a>
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

    <main class="container py-5" role="main">
      <div class="row g-4">
        <div class="col-lg-8">
          <article class="card border-0 shadow-sm overflow-hidden mb-4">
            <!-- Add actual property image - Modern Executive Villa in DHA Lahore -->
            <div class="position-relative">
              <img
                src="images/Data-Driven.png"
                class="card-img-top"
                alt="Modern Executive Villa Property"
                style="height: 450px; object-fit: cover"
              />
              <div class="position-absolute top-0 start-0 m-3">
                <span class="badge bg-success">Verified</span>
                <span class="badge bg-warning text-dark ms-2">Hot Deal</span>
              </div>
              <div class="position-absolute bottom-0 end-0 m-3">
                <button
                  class="btn btn-light btn-sm"
                  aria-label="Add to favorites"
                >
                  <i class="far fa-heart"></i>
                </button>
                <button
                  class="btn btn-light btn-sm ms-2"
                  aria-label="Share property"
                >
                  <i class="fas fa-share-alt"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-4">
              <div
                class="d-flex justify-content-between align-items-center mb-3"
              >
                <h1 class="fw-bold mb-0">Modern Executive Villa</h1>
                <span class="badge bg-success py-2 px-3">Available</span>
              </div>
              <p class="text-muted mb-4">
                <i class="fas fa-map-marker-alt me-2"></i>DHA Phase 6, Lahore,
                Pakistan
              </p>

              <!-- Pakistan-Specific Features -->
              <div class="mb-4">
                <span class="badge bg-light text-dark me-1">Corner Plot</span>
                <span class="badge bg-light text-dark me-1"
                  >Gated Community</span
                >
                <span class="badge bg-light text-dark me-1"
                  >Possession Ready</span
                >
                <span class="badge bg-light text-dark me-1">Park Facing</span>
                <span class="badge bg-light text-dark">Prime Location</span>
              </div>

              <section>
                <h5 class="fw-bold mb-3">
                  <i class="fas fa-chart-line me-2"></i>Market Analysis
                </h5>
                <p class="mb-3">
                  This property is identified as a **High-Yield Asset**. Our
                  analytics show a steady appreciation in this sector. By
                  requesting the full report, you will gain access to heatmaps
                  and historical price trends on our interactive map.
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
                      <td>#PI-9902</td>
                    </tr>
                    <tr>
                      <td class="fw-bold bg-light">Property Type</td>
                      <td>House / Villa</td>
                    </tr>
                    <tr>
                      <td class="fw-bold bg-light">Valuation</td>
                      <td class="text-primary fw-bold">PKR 45,000,000</td>
                    </tr>
                    <tr>
                      <td class="fw-bold bg-light">Land Area</td>
                      <td>1 Kanal (5000 sqft)</td>
                    </tr>
                    <tr>
                      <td class="fw-bold bg-light">Covered Area</td>
                      <td>3500 sqft</td>
                    </tr>
                    <tr>
                      <td class="fw-bold bg-light">Bedrooms</td>
                      <td>5</td>
                    </tr>
                    <tr>
                      <td class="fw-bold bg-light">Bathrooms</td>
                      <td>4</td>
                    </tr>
                    <tr>
                      <td class="fw-bold bg-light">Garage</td>
                      <td>2 Cars</td>
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
                        <span class="badge bg-success">Ready to Move</span>
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
                    <tr>
                      <td class="fw-bold bg-light">Society Features</td>
                      <td>Park, Mosque, School</td>
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
                    <i class="fas fa-check text-success me-2"></i>5 minutes from
                    DHA Main Boulevard
                  </li>
                  <li>
                    <i class="fas fa-check text-success me-2"></i>Near
                    Beaconhouse School System
                  </li>
                  <li>
                    <i class="fas fa-check text-success me-2"></i>Close to
                    Lahore Medical Complex
                  </li>
                  <li>
                    <i class="fas fa-check text-success me-2"></i>Easy access to
                    Ring Road
                  </li>
                </ul>
              </div>
              <div class="col-md-6">
                <ul class="small">
                  <li>
                    <i class="fas fa-check text-success me-2"></i>Walking
                    distance to commercial area
                  </li>
                  <li>
                    <i class="fas fa-check text-success me-2"></i>Park and
                    playground nearby
                  </li>
                  <li>
                    <i class="fas fa-check text-success me-2"></i>Mosque within
                    society premises
                  </li>
                  <li>
                    <i class="fas fa-check text-success me-2"></i>Gated
                    community with security
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
            <form aria-label="Property analysis request form">
              <div class="mb-3">
                <label for="fullName" class="form-label small fw-bold"
                  >Full Name</label
                >
                <input
                  type="text"
                  id="fullName"
                  class="form-control bg-light border-0"
                  placeholder="Muhammad Umar"
                  required
                />
              </div>
              <div class="mb-3">
                <label for="email" class="form-label small fw-bold"
                  >Email</label
                >
                <input
                  type="email"
                  id="email"
                  class="form-control bg-light border-0"
                  placeholder="name@example.com"
                  required
                />
              </div>
              <div class="mb-3">
                <label for="phone" class="form-label small fw-bold"
                  >Phone</label
                >
                <input
                  type="tel"
                  id="phone"
                  class="form-control bg-light border-0"
                  placeholder="+92 300 1234567"
                />
              </div>
              <div class="mb-3">
                <label for="note" class="form-label small fw-bold"
                  >Message</label
                >
                <textarea
                  id="note"
                  class="form-control bg-light border-0"
                  rows="3"
                  placeholder="I want to see the location analytics..."
                ></textarea>
              </div>

              <div class="form-check mb-3">
                <input
                  class="form-check-input"
                  type="checkbox"
                  id="scheduleVisit"
                />
                <label class="form-check-label" for="scheduleVisit">
                  Schedule Property Visit
                </label>
              </div>

              <div class="form-check mb-3">
                <input
                  class="form-check-input"
                  type="checkbox"
                  id="mortgageInfo"
                />
                <label class="form-check-label" for="mortgageInfo">
                  Send Mortgage Information
                </label>
              </div>

              <button
                type="submit"
                class="btn btn-primary w-100 fw-bold py-3 shadow-sm mb-3"
              >
                <i class="fas fa-paper-plane me-2"></i>Request Report & View Map
              </button>

              <a
                href="{{ route('calculator') }}"
                class="btn btn-outline-primary w-100 fw-bold"
              >
                <i class="fas fa-calculator me-2"></i>Calculate Mortgage
              </a>
            </form>

            <!-- Contact Information -->
            <div class="mt-4 pt-3 border-top">
              <h6 class="fw-bold mb-3">Quick Contact</h6>
              <div class="small">
                <div class="mb-2">
                  <i class="fas fa-phone text-primary me-2"></i>
                  <a href="tel:+923001234567" class="text-decoration-none"
                    >+92 300 1234567</a
                  >
                </div>
                <div class="mb-2">
                  <i class="fas fa-envelope text-primary me-2"></i>
                  <a
                    href="mailto:info@propinsight.pk"
                    class="text-decoration-none"
                    >info@propinsight.pk</a
                  >
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

    <footer class="bg-dark text-white py-4 mt-5 text-center" role="contentinfo">
      <div class="container">
        <p class="mb-0">PropInsight&trade; All Rights Reserved.</p>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>


