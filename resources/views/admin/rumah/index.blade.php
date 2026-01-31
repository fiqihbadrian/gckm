@extends('admin.layout')

@section('title', 'Kelola Rumah')

@section('content')
<div class="mb-6">
    <div class="flex justify-between items-center mb-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Kelola Rumah</h1>
            <p class="text-gray-600">Manage data rumah dan penghuni</p>
        </div>
        <a href="{{ route('admin.rumah.create') }}" 
           class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg transition">
            <i class="fas fa-plus mr-2"></i>Tambah Rumah
        </a>
    </div>

    <!-- Filter Section -->
    <div class="bg-white rounded-lg shadow p-4 mb-4">
        <form method="GET" action="{{ route('admin.rumah.index') }}" class="flex gap-4 items-end">
            <div class="flex-1">
                <label for="blok" class="block text-sm font-medium text-gray-700 mb-2">Filter Blok</label>
                <select name="blok" id="blok" 
                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                    <option value="">Semua Blok</option>
                    @foreach($bloks as $blok)
                        <option value="{{ $blok }}" {{ request('blok') == $blok ? 'selected' : '' }}>
                            Blok {{ $blok }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="flex-1">
                <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Filter Status</label>
                <select name="status" id="status" 
                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                    <option value="">Semua Status</option>
                    <option value="terisi" {{ request('status') == 'terisi' ? 'selected' : '' }}>Terisi</option>
                    <option value="kosong" {{ request('status') == 'kosong' ? 'selected' : '' }}>Kosong</option>
                </select>
            </div>
            
            <div class="flex gap-2">
                <button type="submit" 
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 rounded-lg transition">
                    <i class="fas fa-filter mr-2"></i>Filter
                </button>
                <a href="{{ route('admin.rumah.index') }}" 
                   class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-6 py-2.5 rounded-lg transition">
                    <i class="fas fa-redo mr-2"></i>Reset
                </a>
            </div>
        </form>
    </div>
</div>

@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Blok</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No. Rumah</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Penghuni</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kontak</th>
                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah</th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse($rumahs as $rumah)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="text-2xl font-bold text-blue-600">{{ $rumah->blok }}</span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-lg font-semibold text-gray-900">No. {{ $rumah->nomor }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    @if($rumah->status === 'terisi')
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            <i class="fas fa-check-circle mr-1"></i> Terisi
                        </span>
                    @else
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                            <i class="fas fa-home mr-1"></i> Kosong
                        </span>
                    @endif
                </td>
                <td class="px-6 py-4">
                    @if($rumah->penghuni)
                        <div class="font-medium text-gray-900">{{ $rumah->penghuni }}</div>
                        @if($rumah->keterangan)
                            <div class="text-xs text-gray-500">{{ Str::limit($rumah->keterangan, 40) }}</div>
                        @endif
                    @else
                        <span class="text-gray-400 italic">-</span>
                    @endif
                </td>
                <td class="px-6 py-4">
                    @if($rumah->no_telp || $rumah->email)
                        <div class="text-sm">
                            @if($rumah->no_telp)
                                <div class="text-gray-900">
                                    <i class="fas fa-phone text-gray-400 mr-1"></i>{{ $rumah->no_telp }}
                                </div>
                            @endif
                            @if($rumah->email)
                                <div class="text-gray-600">
                                    <i class="fas fa-envelope text-gray-400 mr-1"></i>{{ $rumah->email }}
                                </div>
                            @endif
                        </div>
                    @else
                        <span class="text-gray-400 italic">-</span>
                    @endif
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-center">
                    @if($rumah->jumlah_penghuni)
                        <span class="text-sm font-medium text-gray-900">
                            <i class="fas fa-users text-gray-400 mr-1"></i>{{ $rumah->jumlah_penghuni }}
                        </span>
                    @else
                        <span class="text-gray-400">-</span>
                    @endif
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <a href="{{ route('admin.rumah.edit', $rumah) }}" 
                       class="text-blue-600 hover:text-blue-900 mr-3">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('admin.rumah.destroy', $rumah) }}" 
                          method="POST" class="inline" 
                          onsubmit="return confirm('Yakin ingin menghapus data rumah ini?')">
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
                <td colspan="7" class="px-6 py-8 text-center text-gray-500">
                    <i class="fas fa-home text-4xl mb-2 text-gray-300"></i>
                    <p>Belum ada data rumah.</p>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if($rumahs->hasPages())
<div class="mt-6">
    {{ $rumahs->appends(request()->query())->links() }}
</div>
@endif
@endsection
