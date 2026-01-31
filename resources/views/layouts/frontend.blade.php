<!DOCTYPE html>
<html lang="id" x-data="{ scrolled: false, mobileMenuOpen: false }" @scroll.window="scrolled = (window.pageYOffset > 50)" x-cloak>
<head>
    @include('partials.head')
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="font-sans antialiased">
    @include('partials.navbar')
    
    @yield('content')
    
    @include('partials.footer')
</body>
</html>
