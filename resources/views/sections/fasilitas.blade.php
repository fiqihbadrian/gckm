<!-- FASILITAS SECTION -->
<section id="fasilitas" class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-16">
            <span class="text-green-600 font-semibold text-sm uppercase tracking-wider">Apa Yang Kami Tawarkan</span>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4 mt-2">Fasilitas Perumahan</h2>
            <p class="text-xl text-gray-600">Nikmati berbagai fasilitas lengkap untuk kenyamanan Anda</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach(config('site.facilities') as $facility)
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow">
                <div class="bg-{{ $facility['color'] }}-100 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                    <i class="fas {{ $facility['icon'] }} text-{{ $facility['color'] }}-600 text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ $facility['title'] }}</h3>
                <p class="text-gray-600">{{ $facility['description'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
