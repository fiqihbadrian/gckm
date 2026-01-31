<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $title ?? config('site.meta.title') }}</title>
<meta name="description" content="{{ config('site.meta.description') }}">
<meta name="keywords" content="{{ config('site.meta.keywords') }}">
<meta name="author" content="{{ config('site.meta.author') }}">

<!-- Open Graph / Social Media -->
<meta property="og:title" content="{{ config('site.meta.title') }}">
<meta property="og:description" content="{{ config('site.meta.description') }}">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:image" content="{{ asset(config('site.meta.image')) }}">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ config('site.meta.title') }}">
<meta name="twitter:description" content="{{ config('site.meta.description') }}">
<meta name="twitter:image" content="{{ asset(config('site.meta.image')) }}">
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<style>
    @keyframes blob {
        0% { transform: translate(0px, 0px) scale(1); }
        33% { transform: translate(30px, -50px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
        100% { transform: translate(0px, 0px) scale(1); }
    }
    .animate-blob {
        animation: blob 7s infinite;
    }
    .animation-delay-2000 {
        animation-delay: 2s;
    }
    .animation-delay-4000 {
        animation-delay: 4s;
    }
    @keyframes fade-in-up {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .animate-fade-in-up {
        animation: fade-in-up 1s ease-out;
    }
    
    /* Smooth Scroll Configuration */
    html {
        scroll-behavior: smooth;
        scroll-padding-top: 80px; /* Offset untuk navbar */
    }
    
    * {
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }
    
    body {
        overflow-x: hidden;
        overflow-y: auto;
    }
</style>

<script>
// Enhanced Smooth Scroll untuk performa lebih baik
document.addEventListener('DOMContentLoaded', function() {
    // Handle semua anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            
            // Skip jika href hanya "#"
            if (href === '#' || href === '#!') return;
            
            const target = document.querySelector(href);
            if (target) {
                e.preventDefault();
                
                // Smooth scroll dengan offset
                const offsetTop = target.offsetTop - 80; // 80px untuk navbar
                
                window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth'
                });
                
                // Update URL tanpa jump
                if (history.pushState) {
                    history.pushState(null, null, href);
                }
            }
        });
    });
    
    // Optimize scroll performance
    let ticking = false;
    window.addEventListener('scroll', function() {
        if (!ticking) {
            window.requestAnimationFrame(function() {
                ticking = false;
            });
            ticking = true;
        }
    });
});
</script>
