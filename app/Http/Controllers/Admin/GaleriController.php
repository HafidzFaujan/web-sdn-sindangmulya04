<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::latest()->paginate(12);
        return view('admin.galeri.index', compact('galeris'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'     => 'required|string|max:255',
            'gambar'    => 'required|image|mimes:jpg,jpeg,png,gif,webp|max:6144',
            'deskripsi' => 'nullable|string',
            'kategori'  => 'required|string',
        ]);

        $data = $request->except('gambar');
        $data['gambar'] = $request->file('gambar')->store('galeri', 'public');

        Galeri::create($data);
        return redirect()->route('admin.galeri.index')->with('success', 'Foto galeri berhasil ditambahkan.');
    }

    public function edit(Galeri $galeri)
    {
        return view('admin.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, Galeri $galeri)
    {
        $request->validate([
            'judul'     => 'required|string|max:255',
            'gambar'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'deskripsi' => 'nullable|string',
            'kategori'  => 'required|string',
        ]);

        $data = $request->except('gambar');
        if ($request->hasFile('gambar')) {
            if ($galeri->gambar) Storage::disk('public')->delete($galeri->gambar);
            $data['gambar'] = $request->file('gambar')->store('galeri', 'public');
        }

        $galeri->update($data);
        return redirect()->route('admin.galeri.index')->with('success', 'Foto galeri berhasil diperbarui.');
    }

    public function destroy(Galeri $galeri)
    {
        if ($galeri->gambar) Storage::disk('public')->delete($galeri->gambar);
        $galeri->delete();
        return redirect()->route('admin.galeri.index')->with('success', 'Foto galeri berhasil dihapus.');
    }
}
