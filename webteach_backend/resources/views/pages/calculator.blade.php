@extends('layouts.app')

@section('title', 'Investment Calculator')

@section('content')
    <main class="container py-5" role="main">
      <header class="text-center mb-5">
        <h1 class="fw-bold">Pakistan Real Estate Investment Calculator</h1>
        <p class="text-muted">
          Calculate mortgage payments, ROI, and investment returns for Pakistani
          properties
        </p>
      </header>

      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="card border-0 shadow-lg p-4 p-md-5 rounded-4">
            <div class="text-center mb-4">
              <i class="fas fa-calculator fa-3x text-primary mb-3"></i>
              <h2 class="fw-bold">Mortgage & Investment Estimator</h2>
              <p class="text-muted">
                Calculate your monthly installments and investment returns
                instantly.
              </p>
            </div>

            <form id="mortgageForm" aria-label="Mortgage calculation form">
              <div class="row g-3">
                <div class="col-md-6">
                  <label for="propPrice" class="form-label fw-bold small"
                    >Property Price (PKR)</label
                  >
                  <div class="input-group">
                    <span class="input-group-text bg-light border-0">PKR</span>
                    <input
                      type="number"
                      id="propPrice"
                      class="form-control form-control-lg bg-light border-0"
                      placeholder="e.g. 15000000"
                      required
                      aria-describedby="price-help"
                    />
                  </div>
                  <div id="price-help" class="form-text small text-muted">
                    Enter total property price in Pakistani Rupees
                  </div>
                </div>

                <div class="col-md-6">
                  <label for="downPayment" class="form-label fw-bold small"
                    >Down Payment (%)</label
                  >
                  <div class="input-group">
                    <input
                      type="number"
                      id="downPayment"
                      class="form-control form-control-lg bg-light border-0"
                      placeholder="e.g. 20"
                      required
                      min="0"
                      max="100"
                      aria-describedby="downpayment-help"
                    />
                    <span class="input-group-text bg-light border-0">%</span>
                  </div>
                  <div id="downpayment-help" class="form-text small text-muted">
                    Typically 20-30% for Pakistani banks
                  </div>
                </div>

                <div class="col-md-6">
                  <label for="tenure" class="form-label fw-bold small"
                    >Loan Tenure (Years)</label
                  >
                  <select
                    id="tenure"
                    class="form-select form-select-lg bg-light border-0"
                    aria-describedby="tenure-help"
                  >
                    <option value="5">5 Years</option>
                    <option value="7">7 Years</option>
                    <option value="10">10 Years</option>
                    <option value="15" selected>15 Years</option>
                    <option value="20">20 Years</option>
                    <option value="25">25 Years</option>
                  </select>
                  <div id="tenure-help" class="form-text small text-muted">
                    Maximum 25 years in Pakistan
                  </div>
                </div>

                <div class="col-md-6">
                  <label for="interestRate" class="form-label fw-bold small"
                    >Interest Rate (%)</label
                  >
                  <div class="input-group">
                    <input
                      type="number"
                      id="interestRate"
                      class="form-control form-control-lg bg-light border-0"
                      placeholder="e.g. 11.5"
                      value="11.5"
                      step="0.1"
                      min="0"
                      max="30"
                      aria-describedby="interest-help"
                    />
                    <span class="input-group-text bg-light border-0">%</span>
                  </div>
                  <div id="interest-help" class="form-text small text-muted">
                    Current KIBOR + spread (approx 11-13%)
                  </div>
                </div>

                <div class="col-md-6">
                  <label for="propertyType" class="form-label fw-bold small"
                    >Property Type</label
                  >
                  <select
                    id="propertyType"
                    class="form-select form-select-lg bg-light border-0"
                    aria-describedby="type-help"
                  >
                    @foreach($types as $type)
                        <option value="{{ $type->slug }}">{{ $type->name }}</option>
                    @endforeach
                  </select>
                  <div id="type-help" class="form-text small text-muted">
                    Affects loan terms and rates
                  </div>
                </div>

                <div class="col-md-6">
                  <label for="city" class="form-label fw-bold small"
                    >City</label
                  >
                  <select
                    id="city"
                    class="form-select form-select-lg bg-light border-0"
                    aria-describedby="city-help"
                  >
                    @foreach($cities as $city)
                        <option value="{{ $city->slug }}">{{ $city->name }}</option>
                    @endforeach
                  </select>
                  <div id="city-help" class="form-text small text-muted">
                    Location affects property values
                  </div>
                </div>

                <div class="col-12">
                  <div class="form-check mb-3">
                    <input
                      class="form-check-input"
                      type="checkbox"
                      id="includeRoi"
                    />
                    <label class="form-check-label" for="includeRoi">
                      Calculate ROI and Investment Returns
                    </label>
                  </div>
                </div>
              </div>

              <button
                type="button"
                onclick="calculateMortgageEnhanced()"
                class="btn btn-primary btn-lg w-100 fw-bold shadow-sm"
              >
                <i class="fas fa-calculator me-2"></i>Calculate Investment
              </button>
            </form>

            <div
              id="resultBox"
              class="mt-5 p-4 rounded-3 bg-light text-black text-center d-none"
            >
              <p class="mb-1 text-uppercase small opacity-75">
                Estimated Monthly Payment
              </p>
              <h2 id="monthlyAmount" class="fw-bold mb-3 text-primary">
                PKR 0
              </h2>

              <div id="detailedResults" class="row text-start mt-4">
                <div class="col-md-6 mb-3">
                  <div class="border-bottom border-secondary pb-2 mb-2">
                    <small class="text-muted">Loan Amount</small>
                    <div id="loanAmount" class="fw-bold">PKR 0</div>
                  </div>
                  <div class="border-bottom border-secondary pb-2 mb-2">
                    <small class="text-muted">Down Payment</small>
                    <div id="downPaymentAmount" class="fw-bold">PKR 0</div>
                  </div>
                  <div class="border-bottom border-secondary pb-2 mb-2">
                    <small class="text-muted">Total Interest</small>
                    <div id="totalInterest" class="fw-bold">PKR 0</div>
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <div class="border-bottom border-secondary pb-2 mb-2">
                    <small class="text-muted">Total Payment</small>
                    <div id="totalPayment" class="fw-bold">PKR 0</div>
                  </div>
                  <div class="border-bottom border-secondary pb-2 mb-2">
                    <small class="text-muted">Processing Fee (1%)</small>
                    <div id="processingFee" class="fw-bold">PKR 0</div>
                  </div>
                  <div class="border-bottom border-secondary pb-2 mb-2">
                    <small class="text-muted">Effective Rate</small>
                    <div id="effectiveRate" class="fw-bold">0%</div>
                  </div>
                </div>
              </div>

              <div
                id="roiResults"
                class="mt-4 pt-4 border-top border-secondary d-none"
              >
                <h4 class="fw-bold mb-3">
                  <i class="fas fa-chart-line me-2"></i>Investment Analysis
                </h4>
                <div class="row">
                  <div class="col-md-4 text-center mb-3">
                    <div class="bg-success bg-opacity-25 rounded p-3">
                      <small class="text-success">Expected ROI (Annual)</small>
                      <div id="annualRoi" class="fw-bold text-success">0%</div>
                    </div>
                  </div>
                  <div class="col-md-4 text-center mb-3">
                    <div class="bg-info bg-opacity-25 rounded p-3">
                      <small class="text-info">Break-even Period</small>
                      <div id="breakEven" class="fw-bold text-info">
                        0 years
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 text-center mb-3">
                    <div class="bg-warning bg-opacity-25 rounded p-3">
                      <small class="text-warning">5 Year Projection</small>
                      <div id="fiveYearValue" class="fw-bold text-warning">
                        PKR 0
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Pakistan-Specific Information -->
          <div class="row mt-5 g-4">
            <article class="col-md-6">
              <div class="card border-0 shadow-sm p-4 h-100">
                <h5 class="fw-bold">
                  <i class="fas fa-info-circle me-2"></i>Pakistan Banking
                  Guidelines
                </h5>
                <ul class="small text-muted">
                  <li>Maximum loan-to-value ratio: 80% for residential</li>
                  <li>Maximum tenure: 25 years (age limit 65 years)</li>
                  <li>
                    Islamic banking options available (Ijarah, Diminishing
                    Musharakah)
                  </li>
                  <li>Processing fee: Typically 1-2% of loan amount</li>
                  <li>Insurance required: Life and property insurance</li>
                </ul>
              </div>
            </article>
            <article class="col-md-6">
              <div
                class="card border-0 shadow-sm p-4 h-100 bg-primary text-white"
              >
                <h5 class="fw-bold">
                  <i class="fas fa-lightbulb me-2"></i>Investment Tips
                </h5>
                <ul class="small">
                  <li>DHA and Bahria Town properties offer better financing</li>
                  <li>
                    Commercial properties have higher interest rates but better
                    ROI
                  </li>
                  <li>Consider KIBOR rate fluctuations in long-term loans</li>
                  <li>Factor in property taxes and maintenance costs</li>
                  <li>Location appreciation adds to overall returns</li>
                </ul>
              </div>
            </article>
          </div>
        </div>
      </div>
    </main>
@endsection

@push('scripts')
    <script src="{{ asset('js/calculator-enhanced.js') }}"></script>
@endpush