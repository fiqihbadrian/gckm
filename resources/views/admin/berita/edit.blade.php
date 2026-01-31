@extends('admin.layout')

@section('title', 'Edit Berita')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-800">Edit Berita</h1>
    <p class="text-gray-600">Update berita atau pengumuman</p>
</div>

<div class="bg-white rounded-lg shadow p-6">
    <form action="{{ route('admin.berita.update', $berita) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-6">
            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Judul Berita *</label>
            <input type="text" name="title" id="title" 
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('title') border-red-500 @enderror" 
                   value="{{ old('title', $berita->title) }}" required>
            @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Konten *</label>
            <textarea name="content" id="content" rows="10" 
                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('content') border-red-500 @enderror" 
                      required>{{ old('content', $berita->content) }}</textarea>
            @error('content')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Gambar</label>
            @if($berita->image)
                <div class="mb-3">
                    <img src="{{ Storage::url($berita->image) }}" alt="{{ $berita->title }}" 
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
                <input type="checkbox" name="is_published" value="1" class="mr-2" 
                       {{ old('is_published', $berita->is_published) ? 'checked' : '' }}>
                <span class="text-sm font-medium text-gray-700">Publish berita ini</span>
            </label>
        </div>

        <div class="flex items-center space-x-4">
            <button type="submit" 
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg transition">
                <i class="fas fa-save mr-2"></i>Update Berita
            </button>
            <a href="{{ route('admin.berita.index') }}" 
               class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-6 py-3 rounded-lg transition">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
