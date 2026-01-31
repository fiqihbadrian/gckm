@extends('admin.layout')

@section('title', 'Kelola Denah Blok')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h1 class="text-3xl font-bold text-gray-800">Kelola Denah Blok</h1>
        <p class="text-gray-600">Manage blok-blok perumahan</p>
    </div>
    <a href="{{ route('admin.denah.create') }}" 
       class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg transition">
        <i class="fas fa-plus mr-2"></i>Tambah Blok
    </a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Blok</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Unit</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse($denahs as $denah)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        @if($denah->image)
                        <img src="{{ Storage::url($denah->image) }}" alt="Blok {{ $denah->blok }}" 
                             class="w-16 h-16 object-cover rounded mr-4">
                        @else
                        <div class="w-16 h-16 bg-gray-200 rounded mr-4 flex items-center justify-center">
                            <i class="fas fa-image text-gray-400"></i>
                        </div>
                        @endif
                        <div>
                            <div class="font-bold text-2xl text-gray-900">{{ $denah->blok }}</div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <div class="font-medium text-gray-900">{{ $denah->name }}</div>
                    @if($denah->description)
                        <div class="text-sm text-gray-500">{{ Str::limit($denah->description, 60) }}</div>
                    @endif
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm">
                        <div class="font-semibold text-gray-900">{{ $denah->actual_units ?? 0 }} unit</div>
                        <div class="text-xs text-gray-500">
                            @if($denah->total_units != ($denah->actual_units ?? 0))
                                <span class="text-yellow-600">
                                    <i class="fas fa-exclamation-triangle"></i>
                                    Target: {{ $denah->total_units }}
                                </span>
                            @else
                                <span class="text-green-600">
                                    <i class="fas fa-check-circle"></i>
                                    Sesuai target
                                </span>
                            @endif
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    @if($denah->is_active)
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            Active
                        </span>
                    @else
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                            Inactive
                        </span>
                    @endif
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <a href="{{ route('admin.rumah.index', ['blok' => $denah->blok]) }}" 
                       class="text-green-600 hover:text-green-900 mr-3" title="Kelola Rumah Blok {{ $denah->blok }}">
                        <i class="fas fa-home"></i> Rumah
                    </a>
                    <a href="{{ route('admin.denah.edit', $denah) }}" 
                       class="text-blue-600 hover:text-blue-900 mr-3">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('admin.denah.destroy', $denah) }}" 
                          method="POST" class="inline" 
                          onsubmit="return confirm('Yakin ingin menghapus blok ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-900">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                    <i class="fas fa-map text-4xl mb-3"></i>
                    <p>Belum ada blok. <a href="{{ route('admin.denah.create') }}" class="text-blue-600 hover:underline">Tambah blok pertama</a></p>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-6">
    {{ $denahs->links() }}
</div>
@endsection
