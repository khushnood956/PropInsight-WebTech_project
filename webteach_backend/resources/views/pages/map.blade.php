@extends('layouts.app')

@section('title', 'Location Analytics')

@section('content')
    <main class="container-fluid p-0">
      <div class="row g-0" style="height: calc(100vh - 100px)">
        <div class="col-lg-3 bg-white shadow-sm p-4 z-1">
          <h4 class="fw-bold mb-4">Location Trends</h4>

          <div class="mb-4">
            <label class="small fw-bold text-uppercase text-muted"
              >Current View</label
            >
            <p class="mb-0">Lahore, Punjab, Pakistan</p>
          </div>

          <div class="card border-0 bg-light p-3 mb-3">
            <h6 class="fw-bold text-primary">Hotspot: Gulberg III</h6>
            <p class="small text-muted mb-0">
              Property values in this zone have increased by 12.4% in the last
              quarter.
            </p>
          </div>

          <div class="card border-0 bg-light p-3 mb-3">
            <h6 class="fw-bold text-success">Emerging: DHA Phase 8</h6>
            <p class="small text-muted mb-0">
              High demand for commercial rentals observed near the main
              boulevard.
            </p>
          </div>

          <button class="btn btn-primary w-100 mt-3 py-2 fw-bold">
            Download Report
          </button>
        </div>

        <div class="col-lg-9">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d108844.22650058!2d74.2384351662991!3d31.51307049870335!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39190483e58107d9%3A0xc202c607751d8ef5!2sLahore%2C%20Punjab%2C%20Pakistan!5e0!3m2!1sen!2s!4v1712215200000!5m2!1sen!2s"
            width="100%"
            height="100%"
            style="border: 0"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
          >
          </iframe>
        </div>
      </div>
    </main>
@endsection