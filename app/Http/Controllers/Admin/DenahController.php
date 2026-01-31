<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Denah;
use App\Models\Rumah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class DenahController extends Controller
{
    public function index()
    {
        $denahs = Denah::latest()->paginate(10);
        
        // Calculate actual unit count for each denah from rumahs table
        foreach ($denahs as $denah) {
            $denah->actual_units = Rumah::where('blok', $denah->blok)->count();
        }
        
        return view('admin.denah.index', compact('denahs'));
    }

    public function create()
    {
        return view('admin.denah.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'blok' => 'required|string|max:10',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'total_units' => 'required|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('denah', 'public');
        }

        Denah::create($validated);

        return redirect()->route('admin.denah.index')->with('success', 'Blok berhasil ditambahkan');
    }

    public function edit(Denah $denah)
    {
        return view('admin.denah.edit', compact('denah'));
    }

    public function update(Request $request, Denah $denah)
    {
        $validated = $request->validate([
            'blok' => 'required|string|max:10',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'total_units' => 'required|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            // Delete old image
            if ($denah->image) {
                Storage::disk('public')->delete($denah->image);
            }
            $validated['image'] = $request->file('image')->store('denah', 'public');
        }

        $denah->update($validated);

        return redirect()->route('admin.denah.index')->with('success', 'Blok berhasil diupdate');
    }

    public function destroy(Denah $denah)
    {
        // Delete image
        if ($denah->image) {
            Storage::disk('public')->delete($denah->image);
        }

        $denah->delete();

        return redirect()->route('admin.denah.index')->with('success', 'Blok berhasil dihapus');
    }
}
