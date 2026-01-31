@extends('admin.layout')

@section('title', 'Tambah Berita')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-800">Tambah Berita</h1>
    <p class="text-gray-600">Buat berita atau pengumuman baru</p>
</div>

<div class="bg-white rounded-lg shadow p-6">
    <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-6">
            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Judul Berita *</label>
            <input type="text" name="title" id="title" 
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('title') border-red-500 @enderror" 
                   value="{{ old('title') }}" required>
            @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="excerpt" class="block text-sm font-medium text-gray-700 mb-2">Ringkasan / Deskripsi Singkat *</label>
            <textarea name="excerpt" id="excerpt" rows="3" 
                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('excerpt') border-red-500 @enderror" 
                      placeholder="Tulis ringkasan berita untuk ditampilkan di card (max 500 karakter)"
                      required>{{ old('excerpt') }}</textarea>
            <p class="text-gray-500 text-sm mt-1">Ringkasan ini akan ditampilkan di card berita</p>
            @error('excerpt')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Isi Konten Lengkap *</label>
            <textarea name="content" id="content" rows="10" 
                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('content') border-red-500 @enderror" 
                      placeholder="Tulis isi berita lengkap untuk halaman detail"
                      required>{{ old('content') }}</textarea>
            <p class="text-gray-500 text-sm mt-1">Konten lengkap akan ditampilkan saat klik 'Baca Selengkapnya'</p>
            @error('content')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Gambar</label>
            <input type="file" name="image" id="image" accept="image/*"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('image') border-red-500 @enderror">
            <p class="text-gray-500 text-sm mt-1">Format: JPG, PNG, GIF. Max: 2MB</p>
            @error('image')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="flex items-center">
                <input type="checkbox" name="is_published" value="1" class="mr-2" {{ old('is_published') ? 'checked' : '' }}>
                <span class="text-sm font-medium text-gray-700">Publish berita ini</span>
            </label>
        </div>

        <div class="flex items-center space-x-4">
            <button type="submit" 
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg transition">
                <i class="fas fa-save mr-2"></i>Simpan Berita
            </button>
            <a href="{{ route('admin.berita.index') }}" 
               class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-6 py-3 rounded-lg transition">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<!-- Summernote CSS & JS -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/lang/summernote-id-ID.min.js"></script>

<script>
$(document).ready(function() {
    $('#content').summernote({
        height: 400,
        lang: 'id-ID',
        toolbar: [
            ['style', ['style', 'bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ],
        placeholder: 'Tulis konten berita lengkap di sini...',
        tabsize: 2,
        callbacks: {
            onImageUpload: function(files) {
                // Handle image upload if needed
                for (let i = 0; i < files.length; i++) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#content').summernote('insertImage', e.target.result);
                    };
                    reader.readAsDataURL(files[i]);
                }
            }
        }
    });
});
</script>
@endpush
