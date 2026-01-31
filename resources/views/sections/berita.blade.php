<!-- BERITA TERBARU -->
<section id="berita" class="py-20 bg-gradient-to-br from-blue-50 to-white">
    <div class="max-w-6xl mx-auto px-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-16 gap-4">
            <div class="text-center md:text-left flex-1">
                <span class="text-green-600 font-semibold text-sm uppercase tracking-wider">Info & Update</span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4 mt-2">Berita Terbaru</h2>
                <p class="text-xl text-gray-600">Dapatkan informasi terkini seputar perumahan dan komunitas kita</p>
            </div>
            
            <!-- Search Form -->
            <div class="w-full md:w-auto">
                <form action="{{ route('berita') }}" method="GET" class="relative">
                    <input 
                        type="text" 
                        name="search" 
                        placeholder="Cari berita..." 
                        class="w-full md:w-80 px-4 py-3 pr-12 rounded-full border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition"
                    >
                    <button type="submit" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-green-600 hover:text-green-700">
                        <i class="fas fa-search text-lg"></i>
                    </button>
                </form>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($beritas as $berita)
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow overflow-hidden flex flex-col h-full">
                @if($berita->image)
                    <img src="{{ Storage::url($berita->image) }}" alt="{{ $berita->title }}" class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center">
                        <i class="fas fa-newspaper text-white text-4xl"></i>
                    </div>
                @endif
                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ $berita->title }}</h3>
                    <p class="text-gray-600 mb-4 flex-grow">{{ $berita->excerpt ?? Str::limit(strip_tags($berita->content), 120) }}</p>
                    <div class="flex items-center justify-between mt-auto pt-4 border-t border-gray-100">
                        <span class="text-sm text-gray-500">
                            <i class="far fa-calendar mr-1"></i>{{ $berita->published_at->format('d M Y') }}
                        </span>
                        <a href="{{ route('berita.show', $berita->slug) }}" class="text-green-600 font-semibold hover:underline whitespace-nowrap">Baca Selengkapnya &rarr;</a>
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
        
        <!-- Lihat Semua Berita Button -->
        <div class="text-center mt-12">
            <a href="{{ route('berita') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-green-600 text-white font-semibold rounded-full hover:bg-green-700 transition shadow-lg hover:shadow-xl">
                <span>Lihat Semua Berita</span>
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>
