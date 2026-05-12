@extends('layouts.app')

@section('title', 'Property Map')

@section('content')
<main class="container py-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold">Market Map View</h1>
        <p class="text-muted">Explore properties visually across Pakistan using coordinates.</p>
    </div>

    <div class="card border-0 shadow-sm p-2 mb-4">
        <!-- This represents where your JS map (Leaflet or GMaps) would render -->
        <div class="bg-light rounded d-flex align-items-center justify-content-center" style="height: 600px;">
            <div class="text-center text-muted">
                <i class="fas fa-map-marked-alt fa-4x mb-3"></i>
                <h4>Interactive Map</h4>
                <p>Properties loaded from the database will display pins here based on Latitude/Longitude.</p>
            </div>
        </div>
    </div>
</main>
@endsection