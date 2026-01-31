@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-800">Dashboard</h1>
    <p class="text-gray-600">Selamat datang di admin panel {{ config('site.name') }}</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
    <!-- Total Berita -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">Total Berita</p>
                <p class="text-3xl font-bold text-gray-800">{{ $stats['totalBerita'] }}</p>
                <p class="text-green-600 text-sm mt-1">
                    {{ $stats['beritaPublished'] }} Published
                </p>
            </div>
            <div class="bg-blue-100 p-4 rounded-full">
                <i class="fas fa-newspaper text-blue-600 text-2xl"></i>
            </div>
        </div>
    </div>

    <!-- Total Denah -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">Total Blok</p>
                <p class="text-3xl font-bold text-gray-800">{{ $stats['totalDenah'] }}</p>
                <p class="text-green-600 text-sm mt-1">
                    {{ $stats['denahActive'] }} Active
                </p>
            </div>
            <div class="bg-purple-100 p-4 rounded-full">
                <i class="fas fa-map text-purple-600 text-2xl"></i>
            </div>
        </div>
    </div>

    <!-- Total Rumah -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">Total Rumah</p>
                <p class="text-3xl font-bold text-gray-800">{{ $stats['totalRumah'] }}</p>
                <p class="text-green-600 text-sm mt-1">
                    {{ $stats['rumahTerisi'] }} Terisi
                </p>
            </div>
            <div class="bg-green-100 p-4 rounded-full">
                <i class="fas fa-home text-green-600 text-2xl"></i>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Quick Actions</h2>
        <div class="space-y-3">
            <a href="{{ route('admin.berita.create') }}" 
               class="flex items-center justify-between p-4 bg-blue-50 hover:bg-blue-100 rounded-lg transition">
                <div class="flex items-center">
                    <i class="fas fa-plus-circle text-blue-600 text-xl mr-3"></i>
                    <span class="font-medium text-gray-700">Tambah Berita Baru</span>
                </div>
                <i class="fas fa-arrow-right text-gray-400"></i>
            </a>
            
            <a href="{{ route('admin.denah.create') }}" 
               class="flex items-center justify-between p-4 bg-purple-50 hover:bg-purple-100 rounded-lg transition">
                <div class="flex items-center">
                    <i class="fas fa-plus-circle text-purple-600 text-xl mr-3"></i>
                    <span class="font-medium text-gray-700">Tambah Blok Baru</span>
                </div>
                <i class="fas fa-arrow-right text-gray-400"></i>
            </a>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Website Info</h2>
        <div class="space-y-3">
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded">
                <span class="text-gray-600">Nama Perumahan</span>
                <span class="font-medium text-gray-800">{{ config('site.name') }}</span>
            </div>
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded">
                <span class="text-gray-600">Email</span>
                <span class="font-medium text-gray-800">{{ config('site.contact.email.0') }}</span>
            </div>
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded">
                <span class="text-gray-600">Telepon</span>
                <span class="font-medium text-gray-800">{{ config('site.contact.phone.0') }}</span>
            </div>
        </div>
    </div>
</div>
@endsection
