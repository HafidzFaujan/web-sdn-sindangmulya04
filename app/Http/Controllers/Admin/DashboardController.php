<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Guru;
use App\Models\Sarana;
use App\Models\Galeri;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBerita  = Berita::count();
        $totalGuru    = Guru::count();
        $totalSarana  = Sarana::count();
        $totalGaleri  = Galeri::count();
        $beritaTerbaru = Berita::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalBerita', 'totalGuru', 'totalSarana', 'totalGaleri', 'beritaTerbaru'
        ));
    }
}
