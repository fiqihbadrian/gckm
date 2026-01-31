@extends('layouts.frontend')

@section('content')
<!-- Back Button Fixed -->
<div class="fixed top-24 left-4 md:left-6 z-10">
    <a href="{{ route('berita') }}" class="group flex items-center gap-2 px-3 py-2 md:px-4 md:py-2 bg-white hover:bg-green-600 text-gray-800 hover:text-white rounded-full shadow-lg hover:shadow-xl transition-all duration-300 text-sm md:text-base">
        <i class="fas fa-arrow-left group-hover:-translate-x-1 transition-transform text-sm"></i>
        <span class="font-medium hidden md:inline">Kembali</span>
    </a>
</div>

<!-- Modern Header Section -->
<section class="relative bg-white pt-24 pb-6 md:pb-8">
    <div class="max-w-4xl mx-auto px-4 md:px-6">
        <!-- Breadcrumb -->
        <div class="flex items-center gap-2 text-xs md:text-sm text-gray-600 mb-4 md:mb-6 flex-wrap">
            <a href="{{ route('home') }}" class="hover:text-green-600 transition">Home</a>
            <i class="fas fa-chevron-right text-xs"></i>
            <a href="{{ route('berita') }}" class="hover:text-green-600 transition">Berita</a>
            <i class="fas fa-chevron-right text-xs"></i>
            <span class="text-gray-900 font-medium">Detail</span>
        </div>

        <!-- Date & Category -->
        <div class="flex items-center gap-3 mb-3 md:mb-4">
            <span class="px-2.5 py-1 md:px-3 md:py-1 bg-green-100 text-green-600 rounded-full text-xs md:text-sm font-semibold">
                <i class="far fa-calendar mr-1 text-xs"></i>{{ $berita->published_at->format('d F Y') }}
            </span>
        </div>

        <!-- Title -->
        <h1 class="text-2xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4 md:mb-6 leading-tight break-words">
            {{ $berita->title }}
        </h1>
    </div>
</section>

<!-- Featured Image -->
@if($berita->image)
<section class="max-w-5xl mx-auto px-4 md:px-6 mb-6 md:mb-8">
    <div class="rounded-2xl md:rounded-3xl overflow-hidden shadow-xl md:shadow-2xl">
        <img src="{{ Storage::url($berita->image) }}" alt="{{ $berita->title }}" 
             class="w-full h-auto max-h-[400px] md:max-h-[600px] object-cover">
    </div>
</section>
@endif

<!-- Excerpt/Ringkasan -->
@if($berita->excerpt)
<section class="max-w-3xl mx-auto px-4 md:px-6 mb-6 md:mb-8">
    <div class="bg-green-50 border-l-4 border-green-600 rounded-r-xl md:rounded-r-2xl p-4 md:p-6">
        <div class="flex items-center gap-2 mb-2 md:mb-3">
            <i class="fas fa-info-circle text-green-600 text-sm"></i>
            <h3 class="text-xs md:text-sm font-bold text-green-900 uppercase tracking-wide">Ringkasan</h3>
        </div>
        <p class="text-base md:text-lg text-gray-700 leading-relaxed italic break-words">{{ $berita->excerpt }}</p>
    </div>
</section>
@endif

<!-- Content Section -->
<section class="pb-12 md:pb-16 bg-white">
    <div class="max-w-3xl mx-auto px-4 md:px-6">
        
        <!-- Content Header -->
        <div class="flex items-center gap-2 mb-4 md:mb-6 pb-3 md:pb-4 border-b-2 border-gray-200">
            <i class="fas fa-file-alt text-gray-600 text-sm md:text-base"></i>
            <h2 class="text-lg md:text-xl font-bold text-gray-900">Artikel Lengkap</h2>
        </div>
        
        <!-- Main Content -->
        <article class="prose prose-base md:prose-lg prose-gray max-w-none mb-8 md:mb-12">
            <div class="text-gray-700 leading-relaxed break-words overflow-wrap-anywhere">
                {!! $berita->content !!}
            </div>
        </article>
        
        <!-- Share Section -->
        <div class="bg-gray-50 rounded-xl md:rounded-2xl p-4 md:p-6 mb-8 md:mb-12">
            <h3 class="text-base md:text-lg font-bold text-gray-900 mb-3 md:mb-4 flex items-center gap-2">
                <i class="fas fa-share-alt text-green-600 text-sm md:text-base"></i>
                Bagikan Artikel Ini
            </h3>
            <div class="flex flex-wrap gap-2 md:gap-3">
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('berita.show', $berita->slug)) }}" 
                   target="_blank"
                   class="inline-flex items-center gap-2 px-4 py-2 md:px-5 md:py-3 bg-green-600 text-white rounded-lg md:rounded-xl hover:bg-green-700 transition-all shadow-md hover:shadow-lg transform hover:-translate-y-1 text-sm md:text-base">
                    <i class="fab fa-facebook-f text-sm"></i>
                    <span class="font-medium">Facebook</span>
                </a>
                <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('berita.show', $berita->slug)) }}&text={{ urlencode($berita->title) }}" 
                   target="_blank"
                   class="inline-flex items-center gap-2 px-4 py-2 md:px-5 md:py-3 bg-sky-500 text-white rounded-lg md:rounded-xl hover:bg-sky-600 transition-all shadow-md hover:shadow-lg transform hover:-translate-y-1 text-sm md:text-base">
                    <i class="fab fa-twitter text-sm"></i>
                    <span class="font-medium">Twitter</span>
                </a>
                <a href="https://wa.me/?text={{ urlencode($berita->title . ' - ' . route('berita.show', $berita->slug)) }}" 
                   target="_blank"
                   class="inline-flex items-center gap-2 px-4 py-2 md:px-5 md:py-3 bg-green-600 text-white rounded-lg md:rounded-xl hover:bg-green-700 transition-all shadow-md hover:shadow-lg transform hover:-translate-y-1 text-sm md:text-base">
                    <i class="fab fa-whatsapp text-sm"></i>
                    <span class="font-medium">WhatsApp</span>
                </a>
            </div>
        </div>

    </div>
</section>

<!-- Related News Section -->
@if($relatedBeritas->count() > 0)
<section class="py-12 md:py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 md:px-6">
        <div class="text-center mb-8 md:mb-12">
            <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900 mb-2 md:mb-3">Berita Terkait</h2>
            <p class="text-sm md:text-base text-gray-600">Artikel lainnya yang mungkin Anda minati</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
            @foreach($relatedBeritas as $related)
            <a href="{{ route('berita.show', $related->slug) }}" class="group">
                <div class="bg-white rounded-xl md:rounded-2xl shadow-md hover:shadow-2xl transition-all duration-300 overflow-hidden h-full transform hover:-translate-y-2">
                    @if($related->image)
                        <div class="relative overflow-hidden h-40 md:h-48">
                            <img src="{{ Storage::url($related->image) }}" alt="{{ $related->title }}" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute top-2 right-2 md:top-3 md:right-3 bg-green-600 text-white px-2 py-1 md:px-3 md:py-1 rounded-full text-xs font-semibold">
                                <i class="far fa-calendar mr-1 text-xs"></i>{{ $related->published_at->format('d M') }}
                            </div>
                        </div>
                    @else
                        <div class="w-full h-40 md:h-48 bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center relative">
                            <i class="fas fa-newspaper text-white text-2xl md:text-3xl"></i>
                            <div class="absolute top-2 right-2 md:top-3 md:right-3 bg-white/20 backdrop-blur-sm text-white px-2 py-1 md:px-3 md:py-1 rounded-full text-xs font-semibold">
                                <i class="far fa-calendar mr-1 text-xs"></i>{{ $related->published_at->format('d M') }}
                            </div>
                        </div>
                    @endif
                    <div class="p-4 md:p-5">
                        <h3 class="font-bold text-base md:text-lg text-gray-900 mb-2 group-hover:text-green-600 transition line-clamp-2 break-words">
                            {{ $related->title }}
                        </h3>
                        <p class="text-sm text-gray-600 mb-3 line-clamp-2 break-words">
                            {{ $related->excerpt ?? Str::limit(strip_tags($related->content), 80) }}
                        </p>
                        <div class="flex items-center text-green-600 font-semibold text-xs md:text-sm pt-3 border-t border-gray-100">
                            <span class="flex items-center gap-1">
                                Baca Selengkapnya
                                <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform text-xs"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        <!-- View All Button -->
        <div class="text-center mt-8 md:mt-12">
            <a href="{{ route('berita') }}" 
               class="inline-flex items-center gap-2 px-6 py-3 md:px-8 md:py-4 bg-green-600 text-white font-semibold rounded-full md:rounded-full hover:bg-green-700 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-1 text-sm md:text-base">
                <i class="fas fa-newspaper text-sm"></i>
                <span>Lihat Semua Berita</span>
                <i class="fas fa-arrow-right text-xs"></i>
            </a>
        </div>
    </div>
</section>
@endif

@endsection
