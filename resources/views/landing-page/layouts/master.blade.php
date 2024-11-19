@include('landing-page.layouts.header')
<body>

{{-- Navbar --}}
@include('landing-page.layouts.navbar')

{{-- Main Content --}}
<main>
    @yield('content')
</main>

{{-- Footer (optional) --}}
@include('landing-page.layouts.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

