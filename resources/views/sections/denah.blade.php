<!-- DENAH SECTION -->
<section id="denah" class="py-20 bg-gradient-to-br from-gray-50 to-blue-50" x-data="{ 
    showModal: false, 
    selectedRumah: null,
    openDetail(rumah) {
        this.selectedRumah = rumah;
        this.showModal = true;
    }
}">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-16">
            <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Peta Lokasi</span>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4 mt-2">Denah Perumahan</h2>
            <p class="text-xl text-gray-600">Klik nomor rumah untuk melihat detail</p>
        </div>

        <!-- Legend -->
        <div class="flex flex-col md:flex-row justify-center items-center gap-4 md:gap-8 mb-10">
            <!-- Filter Blok -->
             <div class="flex items-center gap-3 bg-white px-6 py-3 rounded-xl shadow-md">
                <i class="fas fa-filter text-blue-600"></i>
                <select onchange="window.location.href = this.value" 
                        class="border-0 bg-transparent focus:ring-0 font-medium text-gray-700 cursor-pointer">
                    <option value="{{ route('home') }}#denah" {{ !request('blok') ? 'selected' : '' }}>
                        Semua Blok
                    </option>
                    <option value="{{ route('home', ['blok' => 'A']) }}#denah" {{ request('blok') == 'A' ? 'selected' : '' }}>
                        Blok A
                    </option>
                    <option value="{{ route('home', ['blok' => 'B']) }}#denah" {{ request('blok') == 'B' ? 'selected' : '' }}>
                        Blok B
                    </option>
                    <option value="{{ route('home', ['blok' => 'C']) }}#denah" {{ request('blok') == 'C' ? 'selected' : '' }}>
                        Blok C
                    </option>
                    <option value="{{ route('home', ['blok' => 'D']) }}#denah" {{ request('blok') == 'D' ? 'selected' : '' }}>
                        Blok D
                    </option>
                </select>
            </div>
            
            <!-- Legend Items -->
            <div class="flex gap-6">
                <div class="flex items-center gap-2">
                    <div class="w-6 h-6 bg-green-500 rounded"></div>
                    <span class="text-gray-700 font-medium">Terisi</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-6 h-6 bg-orange-500 rounded"></div>
                    <span class="text-gray-700 font-medium">Kosong</span>
                </div>
            </div>
        </div>

        <!-- Blok Grid -->
        @if($blokStats && count($blokStats) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($blokStats as $blok => $stats)
                    @php
                        $badgeColor = $stats['percentage'] >= 80 ? 'green' : ($stats['percentage'] > 0 ? 'yellow' : 'gray');
                    @endphp
                    <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300">
                        <div class="flex justify-between items-center mb-6">
                            <div>
                                <h3 class="text-2xl font-bold text-gray-900">Blok {{ $blok }}</h3>
                                @if($stats['denah']->name)
                                    <p class="text-sm text-gray-500">{{ $stats['denah']->name }}</p>
                                @endif
                            </div>
                            <span class="bg-{{ $badgeColor }}-100 text-{{ $badgeColor }}-800 px-4 py-1 rounded-full text-sm font-semibold">
                                {{ $stats['percentage'] }}% Terisi
                            </span>
                        </div>
                        <div class="mb-4 text-sm text-gray-600">
                            <span class="font-semibold">Total:</span> {{ $stats['total'] }} unit &nbsp;|
                            <span class="font-semibold">Terisi:</span> {{ $stats['terisi'] }} &nbsp;|
                            <span class="font-semibold">Kosong:</span> {{ $stats['kosong'] }}
                        </div>
                        
                        @if($stats['total'] > 0)
                            <div class="grid grid-cols-5 gap-2">
                                @foreach($stats['rumahs']->sortBy('nomor') as $rumah)
                                    <div @click="openDetail({
                                            blok: '{{ $rumah->blok }}',
                                            nomor: '{{ $rumah->nomor }}',
                                            status: '{{ $rumah->status }}',
                                            penghuni: '{{ $rumah->penghuni }}',
                                            no_telp: '{{ $rumah->no_telp }}',
                                            email: '{{ $rumah->email }}',
                                            jumlah_penghuni: '{{ $rumah->jumlah_penghuni }}',
                                            keterangan: '{{ $rumah->keterangan }}'
                                        })"
                                         class="aspect-square bg-{{ $rumah->status == 'terisi' ? 'green' : 'orange' }}-500 rounded-lg flex items-center justify-center text-white text-xs font-bold hover:scale-110 hover:shadow-lg transition-all cursor-pointer">
                                        {{ $rumah->nomor }}
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="bg-gray-50 border-2 border-dashed border-gray-300 rounded-xl p-8 text-center">
                                <i class="fas fa-home text-4xl text-gray-300 mb-3"></i>
                                <p class="text-gray-500 font-medium">Belum ada unit rumah</p>
                                <p class="text-xs text-gray-400 mt-1">Tambahkan rumah di admin panel</p>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12">
                <i class="fas fa-map text-6xl text-gray-300 mb-4"></i>
                <p class="text-gray-500 text-lg">Belum ada blok{{ request('blok') ? ' ' . request('blok') : '' }} yang tersedia.</p>
                <p class="text-gray-400 text-sm mt-2">Silakan tambahkan blok di admin dashboard.</p>
            </div>
        @endif

        <!-- Lokasi -->
        <div class="bg-white rounded-2xl p-6 shadow-lg mt-8" x-data="{ 
            hoveredBlok: null,
            clickBlok(blok) {
                window.location.href = '{{ route('home') }}?blok=' + blok + '#denah';
            }
        }">
            <h3 class="text-2xl font-bold text-gray-900 mb-6">
                <i class="fas fa-map-marked-alt text-blue-600 mr-2"></i>
                Peta Lokasi Perumahan
            </h3>
            <p class="text-gray-600 mb-4">
                <i class="fas fa-hand-pointer text-blue-500 mr-2"></i>
                Klik area blok pada peta untuk melihat detail rumah
            </p>
            
            <div class="relative w-full rounded-lg overflow-hidden shadow-inner bg-gray-100">
                <!-- Main Image -->
                <img
                    src="/images/peta.png"
                    alt="Peta Lokasi {{ config('site.name') }}"
                    class="w-full h-auto object-contain"
                    id="petaMap"
                /> 
                
                <!-- Interactive Overlay Areas -->
                <!-- ============================================ -->
                <!-- CARA MENGGUNAKAN:
                     1. Buka http://localhost:8000/coordinate-mapper.html
                     2. Hover mouse ke 4 sudut area yang ingin dijadikan Blok A
                     3. Catat koordinat persentase (misal: 15,20 untuk sudut kiri-atas)
                     4. Update koordinat di bawah dengan format: x1,y1 x2,y2 x3,y3 x4,y4
                     5. Urutan: Kiri-Atas, Kanan-Atas, Kanan-Bawah, Kiri-Bawah
                -->
                <!-- ============================================ -->
                
                <svg class="absolute inset-0 w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                    
                    <!-- BLOK A - 🔵 Warna Biru -->
                    <!-- Sesuaikan koordinat di bawah ini -->
                    <polygon 
                        points="68,17 77,16 77,63 68,63"
                        
                        class="fill-blue-500 opacity-0 hover:opacity-30 transition-opacity cursor-pointer"
                        @click="clickBlok('A')"
                        @mouseenter="hoveredBlok = 'A'"
                        @mouseleave="hoveredBlok = null"
                    />
                    <polygon 
                        points="63,85 63,94 78,94 79,85"
                        class="fill-blue-500 opacity-0 hover:opacity-30 transition-opacity cursor-pointer"
                        @click="clickBlok('A')"
                        @mouseenter="hoveredBlok = 'A'"
                        @mouseleave="hoveredBlok = null"
                    />
                    
                    <!-- BLOK B - 🟢 Warna Hijau -->
                    <!-- Sesuaikan koordinat di bawah ini -->
                    <polygon 
                        points="14,26 60,25 61,54 14,54"
                        class="fill-green-500 opacity-0 hover:opacity-30 transition-opacity cursor-pointer"
                        @click="clickBlok('B')"
                        @mouseenter="hoveredBlok = 'B'"
                        @mouseleave="hoveredBlok = null"
                    />
                    <!-- Contoh jika Blok B di posisi lain:
                         points="40,25 60,25 60,55 40,55"
                    -->
                    
                    <!-- BLOK C - 🟡 Warna Kuning -->
                    <!-- Sesuaikan koordinat di bawah ini -->
                    <polygon 
                        points="13,64 12,75 60,75 60,65"
                        class="fill-yellow-500 opacity-0 hover:opacity-30 transition-opacity cursor-pointer"
                        @click="clickBlok('C')"
                        @mouseenter="hoveredBlok = 'C'"
                        @mouseleave="hoveredBlok = null"
                    />
                    <polygon 
                        points="1,8 7,7 7,59 1,59"
                        class="fill-yellow-500 opacity-0 hover:opacity-30 transition-opacity cursor-pointer"
                        @click="clickBlok('C')"
                        @mouseenter="hoveredBlok = 'C'"
                        @mouseleave="hoveredBlok = null"
                    />
                    
                    <!-- BLOK D - 🔴 Warna Merah -->
                    <!-- Sesuaikan koordinat di bawah ini -->
                    <polygon 
                        points="15,5 14,16 60,15 61,6"
                        class="fill-red-500 opacity-0 hover:opacity-30 transition-opacity cursor-pointer"
                        @click="clickBlok('D')"
                        @mouseenter="hoveredBlok = 'D'"
                        @mouseleave="hoveredBlok = null"
                    />
                    <!-- Contoh jika Blok D di posisi lain:
                         points="15,60 35,60 35,90 15,90"
                    -->
                    
                </svg>
                
                <!-- Hover Label -->
                <div x-show="hoveredBlok" 
                     x-transition
                     class="absolute top-4 left-1/2 transform -translate-x-1/2 bg-blue-600 text-white px-6 py-3 rounded-full shadow-lg font-bold text-lg">
                    <i class="fas fa-map-marker-alt mr-2"></i>
                    <span x-text="'Blok ' + hoveredBlok"></span>
                </div>
            </div>
            
            <!-- Legend -->
            <div class="mt-6 p-4 bg-blue-50 rounded-lg border border-blue-200">
                <div class="flex flex-wrap gap-4 items-center justify-center text-sm">
                    <div class="flex items-center gap-2">
                        <i class="fas fa-info-circle text-blue-600"></i>
                        <span class="font-semibold text-gray-700">Area yang bisa diklik:</span>
                    </div>
                    <div class="flex items-center gap-2 px-3 py-1 bg-white rounded-lg shadow-sm">
                        <div class="w-3 h-3 rounded-full bg-blue-500"></div>
                        <span class="font-medium text-gray-800">Blok A</span>
                    </div>
                    <div class="flex items-center gap-2 px-3 py-1 bg-white rounded-lg shadow-sm">
                        <div class="w-3 h-3 rounded-full bg-green-500"></div>
                        <span class="font-medium text-gray-800">Blok B</span>
                    </div>
                    <div class="flex items-center gap-2 px-3 py-1 bg-white rounded-lg shadow-sm">
                        <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                        <span class="font-medium text-gray-800">Blok C</span>
                    </div>
                    <div class="flex items-center gap-2 px-3 py-1 bg-white rounded-lg shadow-sm">
                        <div class="w-3 h-3 rounded-full bg-red-500"></div>
                        <span class="font-medium text-gray-800">Blok D</span>
                    </div>
                </div>
                <p class="text-xs text-gray-500 text-center mt-3">
                    <i class="fas fa-lightbulb mr-1"></i>
                    Arahkan kursor ke area blok pada peta untuk melihat nama, klik untuk melihat detail rumah
                </p>
            </div>
        </div>
    </div>

    <!-- Modal Detail Rumah -->
    <div x-show="showModal" 
         x-cloak
         class="fixed inset-0 z-50 overflow-y-auto" 
         style="display: none;"
         @keydown.escape.window="showModal = false">
        <!-- Overlay -->
        <div @click="showModal = false" class="fixed inset-0 bg-black bg-opacity-50 transition-opacity"></div>
        
        <!-- Modal Content -->
        <div class="flex items-center justify-center min-h-screen p-4">
            <div @click.stop 
                 x-show="showModal"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform scale-90"
                 x-transition:enter-end="opacity-100 transform scale-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 transform scale-100"
                 x-transition:leave-end="opacity-0 transform scale-90"
                 class="relative bg-white rounded-2xl shadow-2xl max-w-md w-full overflow-hidden z-50">
                
                <!-- Header -->
                <div class="bg-gradient-to-r from-blue-600 to-purple-600 px-6 py-4 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-home text-white text-2xl"></i>
                        <div>
                            <h3 class="text-xl font-bold text-white">Detail Rumah</h3>
                            <p class="text-blue-100 text-sm" x-show="selectedRumah">
                                Blok <span x-text="selectedRumah?.blok"></span> No. <span x-text="selectedRumah?.nomor"></span>
                            </p>
                        </div>
                    </div>
                    <button @click="showModal = false" class="text-white hover:text-gray-200 transition">
                        <i class="fas fa-times text-2xl"></i>
                    </button>
                </div>

                <!-- Body -->
                <div class="p-6">
                    <!-- Status Badge -->
                    <div class="mb-6 text-center">
                        <span x-show="selectedRumah?.status === 'terisi'" 
                              class="inline-flex items-center gap-2 bg-green-100 text-green-800 px-6 py-3 rounded-full text-lg font-bold">
                            <i class="fas fa-check-circle"></i>
                            <span>Rumah Terisi</span>
                        </span>
                        <span x-show="selectedRumah?.status === 'kosong'" 
                              class="inline-flex items-center gap-2 bg-orange-100 text-orange-800 px-6 py-3 rounded-full text-lg font-bold">
                            <i class="fas fa-info-circle"></i>
                            <span>Rumah Kosong</span>
                        </span>
                    </div>

                    <!-- Detail untuk rumah terisi -->
                    <div x-show="selectedRumah?.status === 'terisi'">
                        <div class="space-y-4">
                            <!-- Nama Penghuni -->
                            <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg">
                                <i class="fas fa-user text-blue-600 text-xl mt-1"></i>
                                <div class="flex-1">
                                    <p class="text-sm text-gray-600 font-medium">Nama Penghuni</p>
                                    <p class="text-gray-900 font-semibold" x-text="selectedRumah?.penghuni || '-'"></p>
                                </div>
                            </div>

                            <!-- Nomor Telepon -->
                            <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg">
                                <i class="fas fa-phone text-green-600 text-xl mt-1"></i>
                                <div class="flex-1">
                                    <p class="text-sm text-gray-600 font-medium">Nomor Telepon</p>
                                    <p class="text-gray-900 font-semibold" x-text="selectedRumah?.no_telp || '-'"></p>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg">
                                <i class="fas fa-envelope text-purple-600 text-xl mt-1"></i>
                                <div class="flex-1">
                                    <p class="text-sm text-gray-600 font-medium">Email</p>
                                    <p class="text-gray-900 font-semibold break-all" x-text="selectedRumah?.email || '-'"></p>
                                </div>
                            </div>

                            <!-- Jumlah Penghuni -->
                            <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg">
                                <i class="fas fa-users text-orange-600 text-xl mt-1"></i>
                                <div class="flex-1">
                                    <p class="text-sm text-gray-600 font-medium">Jumlah Penghuni</p>
                                    <p class="text-gray-900 font-semibold">
                                        <span x-text="selectedRumah?.jumlah_penghuni || '0'"></span> orang
                                    </p>
                                </div>
                            </div>

                            <!-- Keterangan -->
                            <div x-show="selectedRumah?.keterangan" class="flex items-start gap-3 p-3 bg-blue-50 rounded-lg border border-blue-200">
                                <i class="fas fa-info-circle text-blue-600 text-xl mt-1"></i>
                                <div class="flex-1">
                                    <p class="text-sm text-blue-800 font-medium">Keterangan</p>
                                    <p class="text-blue-900" x-text="selectedRumah?.keterangan"></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Detail untuk rumah kosong -->
                    <div x-show="selectedRumah?.status === 'kosong'" class="text-center py-8">
                        <div class="mb-4">
                            <i class="fas fa-home text-gray-300 text-6xl"></i>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 mb-2">Rumah Ini Kosong</h4>
                        <p class="text-gray-600 mb-4">
                            Rumah di Blok <span x-text="selectedRumah?.blok"></span> No. <span x-text="selectedRumah?.nomor"></span> 
                            saat ini belum dihuni.
                        </p>
                        <div class="bg-orange-50 border border-orange-200 rounded-lg p-4">
                            <p class="text-orange-800 text-sm">
                                <i class="fas fa-info-circle mr-2"></i>
                                Untuk informasi lebih lanjut, silakan hubungi kantor pengelola perumahan.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="bg-gray-50 px-6 py-4 flex justify-end">
                    <button @click="showModal = false" 
                            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold transition">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    [x-cloak] {
        display: none !important;
    }
</style>
