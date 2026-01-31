<!-- NAVBAR WRAPPER -->
<div class="fixed top-0 left-0 w-full z-50 flex justify-center pointer-events-none">
    <nav
        id="navbar"
        class="pointer-events-auto transition-all duration-500 ease-out flex items-center justify-between px-6 md:px-10 py-4"
        :class="scrolled ? 'mt-4 w-[90%] max-w-6xl rounded-full bg-white/90 backdrop-blur-md shadow-lg' : 'w-full {{ Request::is('berita*') ? 'bg-white/90 backdrop-blur-md shadow-md' : 'bg-transparent' }}'"
    >
        <!-- LOGO -->
        <a href="{{ route('home') }}" class="font-bold tracking-wide text-green-900 text-xl md:text-2xl">
            GCKM
        </a>

        <!-- DESKTOP MENU -->
        <div class="hidden md:flex gap-8">
            <a href="{{ Request::is('/') ? '#home' : route('home') . '#home' }}" class="font-medium text-gray-800 hover:text-green-600 transition-colors">Home</a>
            <a href="{{ Request::is('/') ? '#denah' : route('home') . '#denah' }}" class="font-medium text-gray-800 hover:text-green-600 transition-colors">Denah</a>
            <a href="{{ Request::is('/') ? '#fasilitas' : route('home') . '#fasilitas' }}" class="font-medium text-gray-800 hover:text-green-600 transition-colors">Fasilitas</a>
            <a href="{{ Request::is('/') ? '#berita' : route('berita') }}" class="font-medium text-gray-800 hover:text-green-600 transition-colors">Berita</a>
            <a href="{{ Request::is('/') ? '#kontak' : route('home') . '#kontak' }}" class="font-medium text-gray-800 hover:text-green-600 transition-colors">Kontak</a>
        </div>

        <!-- MOBILE BUTTON -->
        <button
            @click="mobileMenuOpen = !mobileMenuOpen"
            class="md:hidden relative w-10 h-10 flex flex-col items-center justify-center gap-1.5 focus:outline-none group"
            aria-label="Toggle menu"
        >
            <span 
                class="w-6 h-0.5 bg-gray-800 rounded-full transition-all duration-300 ease-in-out"
                :class="mobileMenuOpen ? 'rotate-45 translate-y-2' : ''"
            ></span>
            <span 
                class="w-6 h-0.5 bg-gray-800 rounded-full transition-all duration-300 ease-in-out"
                :class="mobileMenuOpen ? 'opacity-0' : 'opacity-100'"
            ></span>
            <span 
                class="w-6 h-0.5 bg-gray-800 rounded-full transition-all duration-300 ease-in-out"
                :class="mobileMenuOpen ? '-rotate-45 -translate-y-2' : ''"
            ></span>
        </button>
    </nav>
</div>

<!-- MOBILE MENU -->
<div
    x-show="mobileMenuOpen"
    @click.away="mobileMenuOpen = false"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 -translate-y-2"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 -translate-y-2"
    class="md:hidden fixed top-[72px] left-0 right-0 w-full bg-white/95 backdrop-blur-lg shadow-lg z-40"
    style="display: none;"
>
    <div class="p-6 space-y-2">
        <a href="{{ Request::is('/') ? '#home' : route('home') . '#home' }}" @click="mobileMenuOpen = false" class="block py-3 px-4 font-medium text-zinc-800 hover:bg-zinc-100 rounded-lg transition-colors">Home</a>
        <a href="{{ Request::is('/') ? '#denah' : route('home') . '#denah' }}" @click="mobileMenuOpen = false" class="block py-3 px-4 font-medium text-zinc-800 hover:bg-zinc-100 rounded-lg transition-colors">Denah</a>
        <a href="{{ Request::is('/') ? '#fasilitas' : route('home') . '#fasilitas' }}" @click="mobileMenuOpen = false" class="block py-3 px-4 font-medium text-zinc-800 hover:bg-zinc-100 rounded-lg transition-colors">Fasilitas</a>
        <a href="{{ Request::is('/') ? '#berita' : route('berita') }}" @click="mobileMenuOpen = false" class="block py-3 px-4 font-medium text-zinc-800 hover:bg-zinc-100 rounded-lg transition-colors">Berita</a>
        <a href="{{ Request::is('/') ? '#kontak' : route('home') . '#kontak' }}" @click="mobileMenuOpen = false" class="block py-3 px-4 font-medium text-zinc-800 hover:bg-zinc-100 rounded-lg transition-colors">Kontak</a>
    </div>
</div>
