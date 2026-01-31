<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Denah;
use App\Models\Rumah;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'totalBerita' => Berita::count(),
            'beritaPublished' => Berita::where('is_published', true)->count(),
            'totalDenah' => Denah::count(),
            'denahActive' => Denah::where('is_active', true)->count(),
            'totalRumah' => Rumah::count(),
            'rumahTerisi' => Rumah::where('status', 'terisi')->count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
