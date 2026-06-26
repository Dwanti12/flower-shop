<?php

namespace App\Http\Controllers;

use App\Models\Flower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\PDF;

class FlowerController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        
        $flowers = Flower::when($search, function ($query, $search) {
            return $query->where('nama_bunga', 'like', "%{$search}%")
                         ->orWhere('kode_bunga', 'like', "%{$search}%")
                         ->orWhere('kategori', 'like', "%{$search}%");
        })->paginate(10);

        return view('flowers.index', compact('flowers'));
    }

    public function create()
    {
        return view('flowers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_bunga' => 'required|unique:flowers',
            'nama_bunga' => 'required|string|max:255',
            'kategori' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'tanggal_masuk' => 'required|date',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('flowers', 'public');
        }

        Flower::create($data);

        return redirect()->route('flowers.index')
                         ->with('success', 'Data bunga berhasil ditambahkan!');
    }

    public function show(Flower $flower)
    {
        return view('flowers.show', compact('flower'));
    }

    public function edit(Flower $flower)
    {
        return view('flowers.edit', compact('flower'));
    }

    public function update(Request $request, Flower $flower)
    {
        $request->validate([
            'kode_bunga' => 'required|unique:flowers,kode_bunga,' . $flower->id,
            'nama_bunga' => 'required|string|max:255',
            'kategori' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'tanggal_masuk' => 'required|date',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($flower->gambar) {
                Storage::disk('public')->delete($flower->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('flowers', 'public');
        }

        $flower->update($data);

        return redirect()->route('flowers.index')
                         ->with('success', 'Data bunga berhasil diupdate!');
    }

    public function destroy(Flower $flower)
    {
        if ($flower->gambar) {
            Storage::disk('public')->delete($flower->gambar);
        }
        
        $flower->delete();

        return redirect()->route('flowers.index')
                         ->with('success', 'Data bunga berhasil dihapus!');
    }

    public function generatePDF()
    {
        $flowers = Flower::all();
        
        $pdf = PDF::loadView('flowers.pdf', compact('flowers'));
        $pdf->setPaper('A4', 'landscape');
        
        return $pdf->download('laporan-data-bunga.pdf');
    }
}