<!DOCTYPE html>
<html lang="id" x-data="{ scrolled: false, mobileMenuOpen: false }" @scroll.window="scrolled = (window.pageYOffset > 50)">
<head>
    @include('partials.head')
</head>
<body class="font-sans antialiased">
    @include('partials.navbar')
    
    @yield('content')
    
    @include('partials.footer')
</body>
</html>
