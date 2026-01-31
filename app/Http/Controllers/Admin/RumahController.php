<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rumah;
use App\Models\Denah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RumahController extends Controller
{
    public function index(Request $request)
    {
        $query = Rumah::query();
        
        // Filter by blok if selected
        if ($request->filled('blok')) {
            $query->where('blok', $request->blok);
        }
        
        // Filter by status if selected
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        
        $rumahs = $query->orderBy('blok')->orderBy('nomor')->paginate(20);
        
        // Get all blok from Denah table (sinkron dengan denah blok)
        $bloks = Denah::where('is_active', true)
            ->orderBy('blok')
            ->pluck('blok');
        
        return view('admin.rumah.index', compact('rumahs', 'bloks'));
    }

    public function create()
    {
        // Get all blok from Denah table (sinkron dengan denah blok)
        $bloks = Denah::where('is_active', true)
            ->orderBy('blok')
            ->pluck('blok');
            
        return view('admin.rumah.create', compact('bloks'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'blok' => 'required|string|max:10',
            'nomor' => 'required|integer',
            'status' => 'required|in:terisi,kosong',
            'penghuni' => 'nullable|string|max:255',
            'no_telp' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'jumlah_penghuni' => 'nullable|integer|min:0',
            'keterangan' => 'nullable|string',
        ]);

        // Set default value for jumlah_penghuni if not provided
        if (!isset($validated['jumlah_penghuni']) || $validated['jumlah_penghuni'] === null) {
            $validated['jumlah_penghuni'] = 0;
        }

        Rumah::create($validated);

        return redirect()
            ->route('admin.rumah.index')
            ->with('success', 'Data rumah berhasil ditambahkan!');
    }

    public function edit(Rumah $rumah)
    {
        // Get all blok from Denah table (sinkron dengan denah blok)
        $bloks = Denah::where('is_active', true)
            ->orderBy('blok')
            ->pluck('blok');
            
        return view('admin.rumah.edit', compact('rumah', 'bloks'));
    }

    public function update(Request $request, Rumah $rumah)
    {
        $validated = $request->validate([
            'blok' => 'required|string|max:10',
            'nomor' => 'required|integer',
            'status' => 'required|in:terisi,kosong',
            'penghuni' => 'nullable|string|max:255',
            'no_telp' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'jumlah_penghuni' => 'nullable|integer|min:0',
            'keterangan' => 'nullable|string',
        ]);

        // Set default value for jumlah_penghuni if not provided
        if (!isset($validated['jumlah_penghuni']) || $validated['jumlah_penghuni'] === null) {
            $validated['jumlah_penghuni'] = 0;
        }

        $rumah->update($validated);

        return redirect()
            ->route('admin.rumah.index')
            ->with('success', 'Data rumah berhasil diupdate!');
    }

    public function destroy(Rumah $rumah)
    {
        $rumah->delete();

        return redirect()
            ->route('admin.rumah.index')
            ->with('success', 'Data rumah berhasil dihapus!');
    }
}
