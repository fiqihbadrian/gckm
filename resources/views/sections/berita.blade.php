<!-- BERITA TERBARU -->
<section id="berita" class="py-20 bg-gradient-to-br from-blue-50 to-white">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-16">
            <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Info & Update</span>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4 mt-2">Berita Terbaru</h2>
            <p class="text-xl text-gray-600">Dapatkan informasi terkini seputar perumahan dan komunitas kita</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($beritas as $berita)
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow overflow-hidden">
                @if($berita->image)
                    <img src="{{ Storage::url($berita->image) }}" alt="{{ $berita->title }}" class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center">
                        <i class="fas fa-newspaper text-white text-4xl"></i>
                    </div>
                @endif
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ $berita->title }}</h3>
                    <p class="text-gray-600 mb-4">{{ Str::limit(strip_tags($berita->content), 120) }}</p>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500">
                            <i class="far fa-calendar mr-1"></i>{{ $berita->published_at->format('d M Y') }}
                        </span>
                        <a href="#" class="text-blue-600 font-semibold hover:underline">Baca Selengkapnya &rarr;</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-12">
                <i class="fas fa-inbox text-gray-400 text-5xl mb-4"></i>
                <p class="text-gray-500 text-lg">Belum ada berita terbaru</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
