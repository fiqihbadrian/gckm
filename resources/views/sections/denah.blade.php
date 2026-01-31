<!-- DENAH SECTION -->
<section id="denah" class="py-20 bg-gradient-to-br from-gray-50 to-blue-50">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-16">
            <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Peta Lokasi</span>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4 mt-2">Denah Perumahan</h2>
            <p class="text-xl text-gray-600">Lihat layout dan status hunian di setiap blok</p>
        </div>

        <!-- Legend -->
        <div class="flex justify-center gap-8 mb-10">
            <div class="flex items-center gap-2">
                <div class="w-6 h-6 bg-green-500 rounded"></div>
                <span class="text-gray-700 font-medium">Terisi</span>
            </div>
            <div class="flex items-center gap-2">
                <div class="w-6 h-6 bg-orange-500 rounded"></div>
                <span class="text-gray-700 font-medium">Kosong</span>
            </div>
        </div>

        <!-- Blok Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach(['A', 'B', 'C', 'D'] as $blok)
                @if(isset($blokStats[$blok]))
                    @php
                        $stats = $blokStats[$blok];
                        $badgeColor = $stats['percentage'] >= 80 ? 'green' : 'yellow';
                    @endphp
                    <div class="bg-gray-50 rounded-2xl p-6 shadow-lg">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-2xl font-bold text-gray-900">Blok {{ $blok }}</h3>
                            <span class="bg-{{ $badgeColor }}-100 text-{{ $badgeColor }}-800 px-4 py-1 rounded-full text-sm font-semibold">
                                {{ $stats['percentage'] }}% Terisi
                            </span>
                        </div>
                        <div class="grid grid-cols-5 gap-2">
                            @foreach($stats['rumahs']->sortBy('nomor') as $rumah)
                                <div class="aspect-square bg-{{ $rumah->status == 'terisi' ? 'green' : 'orange' }}-500 rounded-lg flex items-center justify-center text-white text-xs font-bold hover:scale-110 transition-transform cursor-pointer" 
                                     title="{{ $rumah->status == 'terisi' ? 'Terisi - ' . $rumah->penghuni : 'Kosong' }}">
                                    {{ $rumah->nomor }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach

            <!-- Lokasi -->
            <div class="col-span-1 md:col-span-2 lg:col-span-3 bg-white rounded-2xl p-6 shadow-lg">
                <h3 class="text-2xl font-bold text-gray-900 mb-6">Lokasi Perumahan</h3>
                <div class="w-full h-96 rounded-lg overflow-hidden shadow-inner">
                    <img
                        src="https://raw.githubusercontent.com/fiqihbadrian/acc-jambu-2/refs/heads/main/peta.png"
                        alt="Peta Lokasi Perumahan"
                        class="w-full h-full object-contain"
                    /> 
                </div>         
            </div>
        </div>
    </div>
</section>
