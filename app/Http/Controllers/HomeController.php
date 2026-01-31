<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rumah;
use App\Models\Berita;
use App\Models\Denah;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Get filter from request
        $filterBlok = $request->get('blok');
        
        // Get statistics
        $totalRumah = Rumah::count();
        $rumahTerisi = Rumah::where('status', 'terisi')->count();
        $rumahKosong = Rumah::where('status', 'kosong')->count();
        
        // Get active blocks from Denah table
        $denahsQuery = Denah::active()->orderBy('blok');
        
        // Apply filter if specified
        if ($filterBlok) {
            $denahsQuery->where('blok', $filterBlok);
        }
        
        $denahs = $denahsQuery->get();
        
        // Get all houses
        $rumahsByBlok = Rumah::all()->groupBy('blok');
        
        // Calculate stats for each denah blok
        $blokStats = [];
        foreach ($denahs as $denah) {
            $rumahs = $rumahsByBlok->get($denah->blok, collect([]));
            $total = $rumahs->count();
            $terisi = $rumahs->where('status', 'terisi')->count();
            $percentage = $total > 0 ? round(($terisi / $total) * 100) : 0;
            
            $blokStats[$denah->blok] = [
                'rumahs' => $rumahs,
                'total' => $total,
                'terisi' => $terisi,
                'kosong' => $total - $terisi,
                'percentage' => $percentage,
                'denah' => $denah
            ];
        }
        
        // Get published news (latest 3)
        $beritas = Berita::published()->latest('published_at')->take(3)->get();
        
        // Get all unique bloks for filter dropdown (from Denah table)
        $availableBloks = Denah::active()->orderBy('blok')->pluck('blok');
        
        return view('home', compact(
            'totalRumah',
            'rumahTerisi', 
            'rumahKosong',
            'blokStats',
            'beritas',
            'denahs',
            'filterBlok',
            'availableBloks'
        ));
    }
}
