<!DOCTYPE html>
<html lang="id">
<head>
    @include('partials.head')
</head>
<body class="bg-gray-50" x-data="{ scrolled: false, mobileMenuOpen: false }" @scroll.window="scrolled = window.pageYOffset > 50">
    
    @include('partials.navbar')

    @yield('content')

    @include('partials.footer')
    
</body>
</html>
