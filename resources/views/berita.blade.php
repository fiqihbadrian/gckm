@extends('layouts.frontend')

@section('content')
<!-- Modern Header Section -->
<section class="relative bg-white pt-24 pb-12">
    <div class="max-w-6xl mx-auto px-6">
        <!-- Breadcrumb -->
        <div class="flex items-center gap-2 text-sm text-gray-600 mb-6">
            <a href="{{ route('home') }}" class="hover:text-green-600 transition">Home</a>
            <i class="fas fa-chevron-right text-xs"></i>
            <span class="text-gray-900 font-medium">Berita</span>
        </div>

        <!-- Header Content -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-8">
            <div>
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-3">
                    Berita & <span class="text-green-600">Informasi</span>
                </h1>
                <p class="text-lg text-gray-600">Dapatkan update terkini seputar perumahan dan komunitas</p>
            </div>
            
            <!-- Stats -->
            <div class="flex gap-6">
                <div class="text-center">
                    <div class="text-3xl font-bold text-green-600">{{ $beritas->total() }}</div>
                    <div class="text-sm text-gray-600">Total Berita</div>
                </div>
            </div>
        </div>

        <!-- Search Bar -->
        <form action="{{ route('berita') }}" method="GET" class="relative max-w-2xl">
            <input 
                type="text" 
                name="search" 
                value="{{ $search ?? '' }}"
                placeholder="Cari berita berdasarkan judul atau konten..." 
                class="w-full px-6 py-4 pr-14 rounded-2xl border-2 border-gray-200 focus:border-green-500 focus:ring-4 focus:ring-green-100 transition outline-none"
            >
            <button type="submit" class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-green-600 text-white px-4 py-2 rounded-xl hover:bg-green-700 transition">
                <i class="fas fa-search"></i>
            </button>
        </form>
        
        @if($search)
        <div class="mt-4 flex items-center gap-2">
            <span class="text-gray-600">Hasil pencarian untuk:</span>
            <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm font-medium">"{{ $search }}"</span>
            <a href="{{ route('berita') }}" class="text-gray-500 hover:text-gray-700 transition">
                <i class="fas fa-times-circle"></i>
            </a>
        </div>
        @endif
    </div>
</section>

<!-- Berita Grid Section -->
<section class="py-12 bg-gray-50">
    <div class="max-w-6xl mx-auto px-6">
        
        @if($beritas->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
            @foreach($beritas as $berita)
            <a href="{{ route('berita.show', $berita->slug) }}" class="group">
                <div class="bg-white rounded-2xl shadow-md hover:shadow-2xl transition-all duration-300 overflow-hidden flex flex-col h-full transform hover:-translate-y-2">
                    @if($berita->image)
                        <div class="relative overflow-hidden h-48">
                            <img loading="lazy" src="{{ Storage::url($berita->image) }}" alt="{{ $berita->title }}" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute top-3 right-3 bg-green-600 text-white px-3 py-1 rounded-full text-xs font-semibold">
                                <i class="far fa-calendar mr-1"></i>{{ $berita->published_at->format('d M') }}
                            </div>
                        </div>
                    @else
                        <div class="w-full h-48 bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center relative">
                            <i class="fas fa-newspaper text-white text-4xl"></i>
                            <div class="absolute top-3 right-3 bg-white/20 backdrop-blur-sm text-white px-3 py-1 rounded-full text-xs font-semibold">
                                <i class="far fa-calendar mr-1"></i>{{ $berita->published_at->format('d M') }}
                            </div>
                        </div>
                    @endif
                    <div class="p-6 flex flex-col flex-grow">
                        <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-green-600 transition line-clamp-2">
                            {{ $berita->title }}
                        </h3>
                        <p class="text-gray-600 mb-4 flex-grow line-clamp-3">
                            {{ $berita->excerpt ?? Str::limit(strip_tags($berita->content), 120) }}
                        </p>
                        <div class="flex items-center text-green-600 font-semibold mt-auto pt-4 border-t border-gray-100">
                            <span class="group-hover:gap-2 flex items-center transition-all">
                                Baca Selengkapnya 
                                <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="flex justify-center">
            {{ $beritas->links() }}
        </div>

        @else
        <!-- Empty State -->
        <div class="text-center py-20">
            <div class="inline-block p-6 bg-gray-100 rounded-full mb-6">
                <i class="fas fa-search text-gray-400 text-5xl"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-700 mb-2">Tidak ada berita ditemukan</h3>
            <p class="text-gray-500 mb-6 max-w-md mx-auto">
                @if($search)
                    Coba gunakan kata kunci yang berbeda atau periksa ejaan pencarian Anda
                @else
                    Belum ada berita yang dipublikasikan saat ini
                @endif
            </p>
            @if($search)
            <a href="{{ route('berita') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-green-600 text-white font-semibold rounded-xl hover:bg-green-700 transition shadow-lg hover:shadow-xl">
                <i class="fas fa-list"></i>
                <span>Lihat Semua Berita</span>
            </a>
            @endif
        </div>
        @endif

        <!-- Back to Home -->
        <div class="text-center mt-12 pt-8 border-t border-gray-200">
            <a href="{{ route('home') }}#berita" class="inline-flex items-center gap-2 text-gray-600 hover:text-green-600 font-medium transition group">
                <i class="fas fa-arrow-left group-hover:-translate-x-1 transition-transform"></i>
                <span>Kembali ke Beranda</span>
            </a>
        </div>

    </div>
</section>
@endsection
