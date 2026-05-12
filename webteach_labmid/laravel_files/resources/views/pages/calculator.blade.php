@extends('layouts.app')

@section('title', 'Investment Calculator')

@section('content')
<main class="container py-5" role="main">
  <header class="text-center mb-5">
    <h1 class="fw-bold">Pakistan Real Estate Investment Calculator</h1>
    <p class="text-muted">Calculate mortgage payments, ROI, and investment returns for Pakistani properties</p>
  </header>

  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card border-0 shadow-lg p-4 p-md-5 rounded-4">
        <div class="text-center mb-4">
          <i class="fas fa-calculator fa-3x text-primary mb-3"></i>
          <h2 class="fw-bold">Mortgage & Investment Estimator</h2>
          <p class="text-muted">Calculate your monthly installments and investment returns instantly.</p>
        </div>

        <form action="{{ route('calculator.process') }}" method="POST" aria-label="Mortgage calculation form">
          @csrf
          <div class="row g-3">
            <div class="col-md-6">
              <label for="price" class="form-label fw-bold small">Property Price (PKR)</label>
              <div class="input-group">
                <span class="input-group-text bg-light border-0">PKR</span>
                <input type="number" name="price" class="form-control form-control-lg bg-light border-0" placeholder="15000000" required>
              </div>
            </div>

            <div class="col-md-6">
              <label for="down_payment" class="form-label fw-bold small">Down Payment (%)</label>
              <div class="input-group">
                <input type="number" name="down_payment" class="form-control form-control-lg bg-light border-0" placeholder="20" required min="0" max="100">
                <span class="input-group-text bg-light border-0">%</span>
              </div>
            </div>

            <div class="col-md-6">
              <label for="tenure" class="form-label fw-bold small">Loan Tenure (Years)</label>
              <select name="tenure" class="form-select form-select-lg bg-light border-0">
                <option value="5">5 Years</option>
                <option value="10">10 Years</option>
                <option value="15" selected>15 Years</option>
                <option value="20">20 Years</option>
                <option value="25">25 Years</option>
              </select>
            </div>

            <div class="col-md-6">
              <label for="interest_rate" class="form-label fw-bold small">Interest Rate (%)</label>
              <div class="input-group">
                <input type="number" name="interest_rate" class="form-control form-control-lg bg-light border-0" value="11.5" step="0.1" min="0" max="30">
                <span class="input-group-text bg-light border-0">%</span>
              </div>
            </div>
          </div>

          <button type="submit" class="btn btn-primary btn-lg w-100 fw-bold shadow-sm mt-4">
            <i class="fas fa-calculator me-2"></i>Calculate Server-side
          </button>
        </form>

        @if(session('results'))
          <div class="mt-5 p-4 rounded-3 bg-light text-black text-center">
            <p class="mb-1 text-uppercase small opacity-75">Estimated Monthly Payment</p>
            <h2 class="fw-bold mb-3 text-primary">PKR {{ number_format(session('results.monthly_installment')) }}</h2>

            <div class="row text-start mt-4 border-top pt-4">
              <div class="col-md-6 mb-3">
                <div class="border-bottom border-secondary pb-2 mb-2">
                  <small class="text-muted">Loan Amount</small>
                  <div class="fw-bold">PKR {{ number_format(session('results.loan_amount')) }}</div>
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <div class="border-bottom border-secondary pb-2 mb-2">
                  <small class="text-muted">Total Interest Paid</small>
                  <div class="fw-bold text-danger">PKR {{ number_format(session('results.total_interest')) }}</div>
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <div class="border-bottom border-secondary pb-2 mb-2">
                  <small class="text-muted">Processing Fee (1%)</small>
                  <div class="fw-bold">PKR {{ number_format(session('results.processing_fee')) }}</div>
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <div class="border-bottom border-secondary pb-2 mb-2">
                  <small class="text-muted">Estimated Annual ROI</small>
                  <div class="fw-bold text-success">{{ session('results.annual_roi') }}%</div>
                </div>
              </div>
            </div>
          </div>
        @endif

      </div>
    </div>
  </div>
</main>
@endsection