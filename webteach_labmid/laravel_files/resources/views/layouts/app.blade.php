<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PropInsight | @yield('title', 'Real Estate Analytics')</title>
    <!-- Use asset() helper to link your existing local CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  </head>
  <body class="@yield('body-class', '')">
    <div id="market-ticker" class="bg-primary text-white text-center py-1 fw-bold small">
      Initializing Market Feed...
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
      <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">PROP<span class="text-primary">INSIGHT</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('listings.*') ? 'active' : '' }}" href="{{ route('listings.index') }}">Listings</a>
            </li>
            <li class="nav-item">
               <a class="nav-link {{ request()->routeIs('compare') ? 'active' : '' }}" href="{{ route('compare') }}">Compare</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('calculator') ? 'active' : '' }}" href="{{ route('calculator') }}">Calculator</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('map') ? 'active' : '' }}" href="{{ route('map') }}">Map</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content injected here -->
    @yield('content')

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-5 text-center" role="contentinfo">
      <div class="container">
        <p class="mb-0">PropInsight&trade; All Rights Reserved.</p>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    @stack('scripts')
  </body>
</html>