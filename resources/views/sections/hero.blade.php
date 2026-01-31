<!-- HERO SECTION -->
<section id="home" class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 via-white to-blue-100 pt-20 relative overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute top-20 left-10 w-72 h-72 bg-green-200 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-blob"></div>
    <div class="absolute top-40 right-10 w-72 h-72 bg-purple-200 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-blob animation-delay-2000"></div>
    <div class="absolute bottom-20 left-1/2 w-72 h-72 bg-pink-200 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-blob animation-delay-4000"></div>
    
    <div class="max-w-6xl mx-auto px-6 py-20 text-center relative z-10">
        <div class="animate-fade-in-up">
            <h1 class="text-5xl md:text-7xl font-bold text-green-900 mb-6">
                Selamat Datang di<br/>{{ config('site.name') }}
            </h1>
            <p class="text-xl md:text-2xl text-gray-700 mb-8 max-w-3xl mx-auto">
                {{ config('site.tagline') }}
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#denah" class="bg-green-600 text-white px-8 py-4 rounded-full font-semibold hover:bg-green-700 transition-all shadow-lg hover:shadow-xl transform hover:scale-105">
                    <i class="fas fa-map mr-2"></i>Lihat Denah Perumahan
                </a>
                <a href="#kontak" class="bg-white text-green-600 px-8 py-4 rounded-full font-semibold hover:bg-gray-50 transition-all shadow-lg hover:shadow-xl border-2 border-green-600 transform hover:scale-105">
                    <i class="fas fa-envelope mr-2"></i>Hubungi Kami
                </a>
            </div>
        </div>

        <!-- Stats -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-16">
            <div class="bg-white/80 backdrop-blur-md rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all transform hover:scale-105">
                <div class="text-center">
                    <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-home text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-4xl font-bold text-green-600 mb-2">{{ $totalRumah }}</h3>
                    <p class="text-gray-700 font-medium">Total Rumah</p>
                </div>
            </div>
            <div class="bg-white/80 backdrop-blur-md rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all transform hover:scale-105">
                <div class="text-center">
                    <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-check-circle text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-4xl font-bold text-green-600 mb-2">{{ $rumahTerisi }}</h3>
                    <p class="text-gray-700 font-medium">Rumah Terisi</p>
                </div>
            </div>
            <div class="bg-white/80 backdrop-blur-md rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all transform hover:scale-105">
                <div class="text-center">
                    <div class="bg-orange-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-door-open text-orange-600 text-2xl"></i>
                    </div>
                    <h3 class="text-4xl font-bold text-orange-600 mb-2">{{ $rumahKosong }}</h3>
                    <p class="text-gray-700 font-medium">Rumah Kosong</p>
                </div>
            </div>
            <div class="bg-white/80 backdrop-blur-md rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all transform hover:scale-105">
                <div class="text-center">
                    <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-layer-group text-purple-600 text-2xl"></i>
                    </div>
                    <h3 class="text-4xl font-bold text-purple-600 mb-2">{{ count($blokStats) }}</h3>
                    <p class="text-gray-700 font-medium">Total Blok</p>
                </div>
            </div>
        </div>
    </div>
</section>
