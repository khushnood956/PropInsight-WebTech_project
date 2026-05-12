<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Compare Properties | PropInsight</title>
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
              <a class="nav-link active" href="{{ route('compare') }}">Compare</a>
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
      <header class="text-center mb-5">
        <h1 class="fw-bold">Property Comparison Matrix</h1>
        <p class="text-muted">
          Side-by-side analysis of your selected investments with
          Pakistan-specific insights.
        </p>
      </header>

      <section aria-labelledby="comparison-table-heading">
        <h2 id="comparison-table-heading" class="visually-hidden">
          Property Comparison Table
        </h2>
        <div class="table-responsive shadow-sm rounded-4 bg-white p-4">
          <table class="table table-hover align-middle mb-0" role="table">
            <thead class="table-light">
              <tr>
                <th class="py-3 px-4" style="width: 25%">Features</th>
                <th style="width: 25%">
                  <!-- Add actual property image - Luxury Villa -->
                  <div class="d-flex align-items-center">
                    <img
                      src="images/p2.jpg"
                      class="rounded me-2"
                      alt="Luxury Villa"
                      style="width: 40px; height: 40px"
                    />
                    <span>Luxury Villa</span>
                  </div>
                </th>
                <th style="width: 25%">
                  <!-- Add actual property image - Modern Apartment -->
                  <div class="d-flex align-items-center">
                    <img
                      src="images/studioapartment.png"
                      class="rounded me-2"
                      alt="Modern Apartment"
                      style="width: 40px; height: 40px"
                    />
                    <span>Modern Apartment</span>
                  </div>
                </th>
                <th style="width: 25%">
                  <!-- Add actual property image - Corporate Plaza -->
                  <div class="d-flex align-items-center">
                    <img
                      src="images/plaza.png"
                      class="rounded me-2"
                      alt="Corporate Plaza"
                      style="width: 40px; height: 40px"
                    />
                    <span>Corporate Plaza</span>
                  </div>
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="px-4 fw-bold">Price (PKR)</td>
                <td class="text-primary fw-bold">45,000,000</td>
                <td class="text-primary fw-bold">18,500,000</td>
                <td class="text-primary fw-bold">95,000,000</td>
              </tr>
              <tr>
                <td class="px-4 fw-bold">Location</td>
                <td>DHA Phase 6, Lahore</td>
                <td>Gulberg III, Lahore</td>
                <td>Blue Area, Islamabad</td>
              </tr>
              <tr>
                <td class="px-4 fw-bold">Area Size</td>
                <td>1 Kanal (5000 sqft)</td>
                <td>1250 sqft</td>
                <td>4500 sqft</td>
              </tr>
              <tr>
                <td class="px-4 fw-bold">Property Type</td>
                <td><span class="badge bg-light text-dark">House</span></td>
                <td><span class="badge bg-light text-dark">Apartment</span></td>
                <td>
                  <span class="badge bg-light text-dark">Commercial</span>
                </td>
              </tr>
              <tr>
                <td class="px-4 fw-bold">Pakistan Features</td>
                <td>
                  <div class="small">
                    <span class="badge bg-light text-dark me-1"
                      >Corner Plot</span
                    ><br />
                    <span class="badge bg-light text-dark me-1">Gated</span
                    ><br />
                    <span class="badge bg-light text-dark"
                      >Possession Ready</span
                    >
                  </div>
                </td>
                <td>
                  <div class="small">
                    <span class="badge bg-light text-dark me-1"
                      >Prime Location</span
                    ><br />
                    <span class="badge bg-light text-dark me-1"
                      >Installment</span
                    ><br />
                    <span class="badge bg-light text-dark"
                      >Under Construction</span
                    >
                  </div>
                </td>
                <td>
                  <div class="small">
                    <span class="badge bg-light text-dark me-1"
                      >Main Boulevard</span
                    ><br />
                    <span class="badge bg-light text-dark me-1">Basement</span
                    ><br />
                    <span class="badge bg-light text-dark">High ROI</span>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="px-4 fw-bold">Development Status</td>
                <td><span class="badge bg-success">Ready to Move</span></td>
                <td>
                  <span class="badge bg-warning">Under Construction</span>
                </td>
                <td><span class="badge bg-info">Booked</span></td>
              </tr>
              <tr>
                <td class="px-4 fw-bold">Payment Plan</td>
                <td>Full Payment</td>
                <td>Installment Available</td>
                <td>Full Payment</td>
              </tr>
              <tr>
                <td class="px-4 fw-bold">Rental Yield</td>
                <td><span class="badge bg-success">High (6-8%)</span></td>
                <td><span class="badge bg-info">Moderate (4-5%)</span></td>
                <td><span class="badge bg-success">Very High (8-10%)</span></td>
              </tr>
              <tr>
                <td class="px-4 fw-bold">Approval Authority</td>
                <td>LDA Approved</td>
                <td>LDA Approved</td>
                <td>CDA Approved</td>
              </tr>
              <tr>
                <td class="px-4 fw-bold">Utilities</td>
                <td><i class="fas fa-check text-success"></i> All Available</td>
                <td><i class="fas fa-check text-success"></i> All Available</td>
                <td><i class="fas fa-check text-success"></i> All Available</td>
              </tr>
              <tr>
                <td class="px-4 fw-bold">Security</td>
                <td><i class="fas fa-shield-alt text-success"></i> 24/7</td>
                <td><i class="fas fa-shield-alt text-success"></i> 24/7</td>
                <td><i class="fas fa-shield-alt text-success"></i> 24/7</td>
              </tr>
              <tr>
                <td class="px-4 fw-bold">Investment Score</td>
                <td>
                  <div class="progress" style="height: 20px">
                    <div class="progress-bar bg-success" style="width: 85%">
                      85%
                    </div>
                  </div>
                </td>
                <td>
                  <div class="progress" style="height: 20px">
                    <div class="progress-bar bg-info" style="width: 70%">
                      70%
                    </div>
                  </div>
                </td>
                <td>
                  <div class="progress" style="height: 20px">
                    <div class="progress-bar bg-success" style="width: 95%">
                      95%
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="px-4 fw-bold">Action</td>
                <td>
                  <button
                    class="btn btn-sm btn-dark w-100"
                    aria-label="View Luxury Villa data"
                  >
                    View Data
                  </button>
                </td>
                <td>
                  <button
                    class="btn btn-sm btn-dark w-100"
                    aria-label="View Modern Apartment data"
                  >
                    View Data
                  </button>
                </td>
                <td>
                  <button
                    class="btn btn-sm btn-dark w-100"
                    aria-label="View Corporate Plaza data"
                  >
                    View Data
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>

      <section class="row mt-5 g-4" aria-labelledby="insights-heading">
        <h2 id="insights-heading" class="visually-hidden">
          Investment Insights
        </h2>
        <article class="col-md-6">
          <div class="card border-0 shadow-sm p-4 h-100">
            <h5 class="fw-bold">
              <i class="fas fa-chart-line me-2"></i>Why Compare?
            </h5>
            <p class="small text-muted mb-3">
              Using the comparison matrix allows you to evaluate
              price-per-square-foot metrics and ROI projections across different
              sectors in real-time.
            </p>
            <ul class="small text-muted">
              <li>Compare development authorities (LDA, CDA, KDA)</li>
              <li>Analyze payment plans and possession status</li>
              <li>Evaluate rental yields by property type</li>
              <li>Assess location-specific advantages</li>
            </ul>
          </div>
        </article>
        <article class="col-md-6">
          <div class="card border-0 shadow-sm p-4 h-100 bg-primary text-white">
            <h5 class="fw-bold">
              <i class="fas fa-lightbulb me-2"></i>Investment Insight
            </h5>
            <p class="small mb-3">
              The Corporate Plaza currently offers the highest rental yield
              (8-10%) compared to residential sectors, making it ideal for
              commercial investors.
            </p>
            <div class="small">
              <div class="d-flex justify-content-between mb-2">
                <span>Best ROI:</span>
                <span class="fw-bold">Corporate Plaza</span>
              </div>
              <div class="d-flex justify-content-between mb-2">
                <span>Best for Living:</span>
                <span class="fw-bold">Luxury Villa</span>
              </div>
              <div class="d-flex justify-content-between">
                <span>Best for Budget:</span>
                <span class="fw-bold">Modern Apartment</span>
              </div>
            </div>
          </div>
        </article>
      </section>

      <!-- Additional Comparison Tools -->
      <section class="mt-5" aria-labelledby="tools-heading">
        <h2 id="tools-heading" class="fw-bold mb-4">Comparison Tools</h2>
        <div class="row g-4">
          <div class="col-md-4">
            <div class="card border-0 shadow-sm p-4 text-center h-100">
              <i class="fas fa-calculator fa-3x text-primary mb-3"></i>
              <h5 class="fw-bold">Mortgage Calculator</h5>
              <p class="small text-muted">
                Calculate monthly payments and total interest for each property.
              </p>
              <a href="{{ route('calculator') }}" class="btn btn-outline-primary btn-sm"
                >Calculate Now</a
              >
            </div>
          </div>
          <div class="col-md-4">
            <div class="card border-0 shadow-sm p-4 text-center h-100">
              <i class="fas fa-map-marked-alt fa-3x text-success mb-3"></i>
              <h5 class="fw-bold">Location Analysis</h5>
              <p class="small text-muted">
                View properties on map with nearby amenities and infrastructure.
              </p>
              <a href="{{ route('map') }}" class="btn btn-outline-success btn-sm"
                >View on Map</a
              >
            </div>
          </div>
          <div class="col-md-4">
            <div class="card border-0 shadow-sm p-4 text-center h-100">
              <i class="fas fa-file-alt fa-3x text-warning mb-3"></i>
              <h5 class="fw-bold">Detailed Reports</h5>
              <p class="small text-muted">
                Generate comprehensive analysis reports for investment
                decisions.
              </p>
              <button class="btn btn-outline-warning btn-sm">
                Generate Report
              </button>
            </div>
          </div>
        </div>
      </section>
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


