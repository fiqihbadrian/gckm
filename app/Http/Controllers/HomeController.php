<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rumah;
use App\Models\Berita;
use App\Models\Denah;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Get filter from request
        $filterBlok = $request->get('blok');
        
        // Cache statistics for 5 minutes
        $stats = Cache::remember('home.stats', 300, function() {
            return [
                'total' => Rumah::count(),
                'terisi' => Rumah::where('status', 'terisi')->count(),
                'kosong' => Rumah::where('status', 'kosong')->count(),
            ];
        });
        
        $totalRumah = $stats['total'];
        $rumahTerisi = $stats['terisi'];
        $rumahKosong = $stats['kosong'];
        
        // Get active blocks from Denah table
        $denahsQuery = Denah::active()->orderBy('blok');
        
        // Apply filter if specified
        if ($filterBlok) {
            $denahsQuery->where('blok', $filterBlok);
        }
        
        $denahs = $denahsQuery->get();
        
        // Get all houses - optimize with select only needed columns
        $rumahsByBlok = Rumah::select('id', 'blok', 'nomor', 'status', 'penghuni')
            ->get()
            ->groupBy('blok');
        
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
        
        // Get published news (latest 3) - cache for 10 minutes
        $beritas = Cache::remember('home.beritas', 600, function() {
            return Berita::published()
                ->select('id', 'title', 'slug', 'excerpt', 'image', 'published_at', 'created_at')
                ->latest('published_at')
                ->take(3)
                ->get();
        });
        
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
    
    public function berita(Request $request)
    {
        $search = $request->get('search');
        
        $beritas = Berita::published()
            ->when($search, function($query, $search) {
                return $query->where(function($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                      ->orWhere('content', 'like', "%{$search}%");
                });
            })
            ->latest('published_at')
            ->paginate(9);
        
        return view('berita', compact('beritas', 'search'));
    }
    
    public function showBerita(Berita $berita)
    {
        // Check if berita is published
        if (!$berita->is_published || $berita->published_at > now()) {
            abort(404);
        }
        
        // Get related news (same category, latest 3, exclude current)
        $relatedBeritas = Berita::published()
            ->where('id', '!=', $berita->id)
            ->latest('published_at')
            ->take(3)
            ->get();
        
        return view('berita-detail', compact('berita', 'relatedBeritas'));
    }
}
