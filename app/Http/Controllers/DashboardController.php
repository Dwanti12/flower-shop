<?php

namespace App\Http\Controllers;

use App\Models\Flower;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBunga = Flower::count();
        $totalStok = Flower::sum('stok');
        $totalKategori = Flower::distinct('kategori')->count('kategori');

        return view('dashboard', compact('totalBunga', 'totalStok', 'totalKategori'));
    }
}