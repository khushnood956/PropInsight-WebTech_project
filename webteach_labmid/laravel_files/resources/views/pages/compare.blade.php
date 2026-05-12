@extends('layouts.app')

@section('title', 'Compare Properties')

@section('content')
<main class="container py-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold">Compare Properties</h1>
        <p class="text-muted">Select properties side-by-side to make your investment decision.</p>
    </div>

    <div class="table-responsive shadow-sm bg-white rounded">
        <table class="table table-bordered text-center align-middle mb-0">
            <thead class="bg-light">
                <tr>
                    <th class="w-25 text-start p-4">Features</th>
                    <th class="w-25 p-4">
                        <div class="text-muted mb-2">Select Property 1</div>
                        <a href="{{ route('listings.index') }}" class="btn btn-outline-primary btn-sm">+ Add Item</a>
                    </th>
                    <th class="w-25 p-4">
                        <div class="text-muted mb-2">Select Property 2</div>
                        <a href="{{ route('listings.index') }}" class="btn btn-outline-primary btn-sm">+ Add Item</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-start fw-bold p-3">Price</td>
                    <td>-</td>
                    <td>-</td>
                </tr>
                <tr>
                    <td class="text-start fw-bold p-3">Location</td>
                    <td>-</td>
                    <td>-</td>
                </tr>
                <tr>
                    <td class="text-start fw-bold p-3">Bedrooms</td>
                    <td>-</td>
                    <td>-</td>
                </tr>
                <tr>
                    <td class="text-start fw-bold p-3">Bathrooms</td>
                    <td>-</td>
                    <td>-</td>
                </tr>
                <tr>
                    <td class="text-start fw-bold p-3">Area</td>
                    <td>-</td>
                    <td>-</td>
                </tr>
            </tbody>
        </table>
    </div>
</main>
@endsection