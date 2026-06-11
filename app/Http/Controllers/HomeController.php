<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Guru;
use App\Models\Sarana;
use App\Models\Galeri;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $beritas = Berita::where('is_published', true)->latest()->take(3)->get();
        $gurus = Guru::where('is_active', true)->orderBy('urutan')->get();
        return view('frontend.home', compact('beritas', 'gurus'));
    }

    public function profil()
    {
        return view('frontend.profil');
    }

    public function sarana()
    {
        $saranas = Sarana::all();
        return view('frontend.sarana', compact('saranas'));
    }

    public function berita()
    {
        $beritas = Berita::where('is_published', true)->latest()->paginate(9);
        return view('frontend.berita', compact('beritas'));
    }

    public function beritaDetail($slug)
    {
        $berita = Berita::where('slug', $slug)->where('is_published', true)->firstOrFail();
        $lainnya = Berita::where('is_published', true)->where('id', '!=', $berita->id)->latest()->take(3)->get();
        return view('frontend.berita-detail', compact('berita', 'lainnya'));
    }

    public function guru()
    {
        $kepala  = Guru::where('is_active', true)->where('kategori', 'kepala_sekolah')->first();
        $staf    = Guru::where('is_active', true)->where('kategori', 'staf')->orderBy('urutan')->get();
        $wali    = Guru::where('is_active', true)->where('kategori', 'wali_kelas')->orderBy('urutan')->get();
        $mapel   = Guru::where('is_active', true)->where('kategori', 'guru_mapel')->orderBy('urutan')->get();
        // Gabungkan wali kelas dan guru mapel
        $list    = $wali->merge($mapel);
        return view('frontend.guru', compact('kepala', 'staf', 'wali', 'mapel', 'list'));
    }

    public function galeri()
    {
        $galeris = Galeri::latest()->get();
        return view('frontend.galeri', compact('galeris'));
    }

    public function kontak()
    {
        return view('frontend.kontak');
    }
}
