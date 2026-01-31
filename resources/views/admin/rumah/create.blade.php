@extends('admin.layout')

@section('title', 'Tambah Rumah')

@section('content')
<div class="mb-6">
    <div class="flex items-center mb-4">
        <a href="{{ route('admin.rumah.index') }}" 
           class="text-gray-600 hover:text-gray-900 mr-4">
            <i class="fas fa-arrow-left"></i>
        </a>
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Tambah Rumah Baru</h1>
            <p class="text-gray-600">Tambah data rumah dan penghuni</p>
        </div>
    </div>
</div>

<div class="bg-white rounded-lg shadow-lg p-6">
    <form action="{{ route('admin.rumah.store') }}" method="POST">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Blok -->
            <div>
                <label for="blok" class="block text-sm font-medium text-gray-700 mb-2">
                    Blok <span class="text-red-500">*</span>
                </label>
                @if($bloks->count() > 0)
                    <select name="blok" id="blok" required
                            class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 @error('blok') border-red-500 @enderror">
                        <option value="">Pilih Blok</option>
                        @foreach($bloks as $blok)
                            <option value="{{ $blok }}" {{ old('blok') == $blok ? 'selected' : '' }}>
                                Blok {{ $blok }}
                            </option>
                        @endforeach
                    </select>
                    <p class="text-xs text-gray-500 mt-1">Blok sinkron dengan Denah Blok</p>
                @else
                    <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                        <p class="text-sm text-yellow-800">
                            <i class="fas fa-exclamation-triangle mr-2"></i>
                            Belum ada blok aktif. Silakan buat blok di 
                            <a href="{{ route('admin.denah.create') }}" class="font-semibold underline hover:text-yellow-900">
                                Denah Blok
                            </a> terlebih dahulu.
                        </p>
                    </div>
                @endif
                @error('blok')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Nomor Rumah -->
            <div>
                <label for="nomor" class="block text-sm font-medium text-gray-700 mb-2">
                    Nomor Rumah <span class="text-red-500">*</span>
                </label>
                <input type="number" name="nomor" id="nomor" required
                       value="{{ old('nomor') }}"
                       class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 @error('nomor') border-red-500 @enderror"
                       placeholder="Contoh: 1">
                @error('nomor')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Status -->
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                    Status <span class="text-red-500">*</span>
                </label>
                <select name="status" id="status" required
                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 @error('status') border-red-500 @enderror">
                    <option value="">Pilih Status</option>
                    <option value="kosong" {{ old('status') == 'kosong' ? 'selected' : '' }}>Kosong</option>
                    <option value="terisi" {{ old('status') == 'terisi' ? 'selected' : '' }}>Terisi</option>
                </select>
                @error('status')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Nama Penghuni -->
            <div>
                <label for="penghuni" class="block text-sm font-medium text-gray-700 mb-2">
                    Nama Penghuni
                </label>
                <input type="text" name="penghuni" id="penghuni"
                       value="{{ old('penghuni') }}"
                       class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 @error('penghuni') border-red-500 @enderror"
                       placeholder="Nama lengkap penghuni">
                @error('penghuni')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- No. Telepon -->
            <div>
                <label for="no_telp" class="block text-sm font-medium text-gray-700 mb-2">
                    No. Telepon
                </label>
                <input type="text" name="no_telp" id="no_telp"
                       value="{{ old('no_telp') }}"
                       class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 @error('no_telp') border-red-500 @enderror"
                       placeholder="08xxxxxxxxxx">
                @error('no_telp')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                    Email
                </label>
                <input type="email" name="email" id="email"
                       value="{{ old('email') }}"
                       class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 @error('email') border-red-500 @enderror"
                       placeholder="email@example.com">
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Jumlah Penghuni -->
            <div>
                <label for="jumlah_penghuni" class="block text-sm font-medium text-gray-700 mb-2">
                    Jumlah Penghuni
                </label>
                <input type="number" name="jumlah_penghuni" id="jumlah_penghuni" min="0"
                       value="{{ old('jumlah_penghuni') }}"
                       class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 @error('jumlah_penghuni') border-red-500 @enderror"
                       placeholder="Jumlah orang">
                @error('jumlah_penghuni')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Keterangan -->
        <div class="mt-6">
            <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-2">
                Keterangan
            </label>
            <textarea name="keterangan" id="keterangan" rows="4"
                      class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 @error('keterangan') border-red-500 @enderror"
                      placeholder="Catatan atau informasi tambahan...">{{ old('keterangan') }}</textarea>
            @error('keterangan')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Action Buttons -->
        <div class="mt-8 flex justify-end gap-4">
            <a href="{{ route('admin.rumah.index') }}" 
               class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                Batal
            </a>
            @if($bloks->count() > 0)
                <button type="submit" 
                        class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    <i class="fas fa-save mr-2"></i>Simpan
                </button>
            @else
                <button type="button" disabled
                        class="px-6 py-2 bg-gray-400 text-white rounded-lg cursor-not-allowed">
                    <i class="fas fa-save mr-2"></i>Simpan (Blok belum ada)
                </button>
            @endif
        </div>
    </form>
</div>
@endsection
