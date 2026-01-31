<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard') - {{ config('site.name') }}</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100" x-data="{ sidebarOpen: true }">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" 
               class="fixed inset-y-0 left-0 z-50 w-64 bg-blue-900 text-white transition-transform duration-300 ease-in-out lg:translate-x-0 lg:static lg:inset-0">
            <div class="flex items-center justify-between h-16 px-6 bg-blue-950">
                <span class="text-xl font-bold">Admin Panel</span>
                <button @click="sidebarOpen = false" class="lg:hidden">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <nav class="px-4 py-6 space-y-2">
                <a href="{{ route('admin.dashboard') }}" 
                   class="flex items-center px-4 py-3 rounded-lg transition {{ request()->routeIs('admin.dashboard') ? 'bg-blue-800' : 'hover:bg-blue-800' }}">
                    <i class="fas fa-dashboard w-6"></i>
                    <span class="ml-3">Dashboard</span>
                </a>
                
                <a href="{{ route('admin.berita.index') }}" 
                   class="flex items-center px-4 py-3 rounded-lg transition {{ request()->routeIs('admin.berita.*') ? 'bg-blue-800' : 'hover:bg-blue-800' }}">
                    <i class="fas fa-newspaper w-6"></i>
                    <span class="ml-3">Berita</span>
                </a>
                
                <a href="{{ route('admin.denah.index') }}" 
                   class="flex items-center px-4 py-3 rounded-lg transition {{ request()->routeIs('admin.denah.*') ? 'bg-blue-800' : 'hover:bg-blue-800' }}">
                    <i class="fas fa-map w-6"></i>
                    <span class="ml-3">Denah Blok</span>
                </a>
                
                <a href="{{ route('admin.rumah.index') }}" 
                   class="flex items-center px-4 py-3 rounded-lg transition {{ request()->routeIs('admin.rumah.*') ? 'bg-blue-800' : 'hover:bg-blue-800' }}">
                    <i class="fas fa-home w-6"></i>
                    <span class="ml-3">Kelola Rumah</span>
                </a>
                
                <hr class="my-4 border-blue-700">
                
                <a href="{{ route('home') }}" target="_blank" class="flex items-center px-4 py-3 rounded-lg transition hover:bg-blue-800">
                    <i class="fas fa-home w-6"></i>
                    <span class="ml-3">Lihat Website</span>
                </a>
                
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center px-4 py-3 rounded-lg transition hover:bg-red-700">
                        <i class="fas fa-sign-out-alt w-6"></i>
                        <span class="ml-3">Logout</span>
                    </button>
                </form>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex flex-col flex-1 overflow-hidden">
            <!-- Top Bar -->
            <header class="flex items-center justify-between h-16 px-6 bg-white border-b border-gray-200">
                <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden">
                    <i class="fas fa-bars text-gray-600"></i>
                </button>
                
                <div class="flex items-center space-x-4">
                    <span class="text-gray-700">{{ Auth::user()->name }}</span>
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=3b82f6&color=fff" 
                         alt="Avatar" class="w-10 h-10 rounded-full">
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-6">
                @if(session('success'))
                    <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
    
    @stack('scripts')
</body>
</html>
