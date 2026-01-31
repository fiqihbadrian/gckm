@extends('admin.layout')

@section('title', 'Edit Blok')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-800">Edit Blok</h1>
    <p class="text-gray-600">Update informasi blok perumahan</p>
</div>

<div class="bg-white rounded-lg shadow p-6">
    <form action="{{ route('admin.denah.update', $denah) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label for="blok" class="block text-sm font-medium text-gray-700 mb-2">Blok *</label>
                <input type="text" name="blok" id="blok" placeholder="A, B, C, etc" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('blok') border-red-500 @enderror" 
                       value="{{ old('blok', $denah->blok) }}" required>
                @error('blok')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="total_units" class="block text-sm font-medium text-gray-700 mb-2">Total Unit *</label>
                <input type="number" name="total_units" id="total_units" min="0" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('total_units') border-red-500 @enderror" 
                       value="{{ old('total_units', $denah->total_units) }}" required>
                @error('total_units')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mb-6">
            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Blok *</label>
            <input type="text" name="name" id="name" placeholder="Blok Anggrek" 
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('name') border-red-500 @enderror" 
                   value="{{ old('name', $denah->name) }}" required>
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
            <textarea name="description" id="description" rows="4" placeholder="Deskripsi blok..." 
                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('description') border-red-500 @enderror">{{ old('description', $denah->description) }}</textarea>
            @error('description')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Gambar Denah</label>
            @if($denah->image)
                <div class="mb-3">
                    <img src="{{ Storage::url($denah->image) }}" alt="Blok {{ $denah->blok }}" 
                         class="w-48 h-48 object-cover rounded">
                </div>
            @endif
            <input type="file" name="image" id="image" accept="image/*"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('image') border-red-500 @enderror">
            <p class="text-gray-500 text-sm mt-1">Format: JPG, PNG, GIF. Max: 2MB. Kosongkan jika tidak ingin mengubah gambar.</p>
            @error('image')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="flex items-center">
                <input type="checkbox" name="is_active" value="1" class="mr-2" 
                       {{ old('is_active', $denah->is_active) ? 'checked' : '' }}>
                <span class="text-sm font-medium text-gray-700">Aktifkan blok ini</span>
            </label>
        </div>

        <div class="flex items-center space-x-4">
            <button type="submit" 
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg transition">
                <i class="fas fa-save mr-2"></i>Update Blok
            </button>
            <a href="{{ route('admin.denah.index') }}" 
               class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-6 py-3 rounded-lg transition">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
