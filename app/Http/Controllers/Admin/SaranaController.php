<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sarana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SaranaController extends Controller
{
    public function index()
    {
        $saranas = Sarana::latest()->paginate(10);
        return view('admin.sarana.index', compact('saranas'));
    }

    public function create()
    {
        return view('admin.sarana.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kondisi'   => 'required|string',
            'jumlah'    => 'required|integer|min:1',
            'gambar'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except('gambar');
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('sarana', 'public');
        }

        Sarana::create($data);
        return redirect()->route('admin.sarana.index')->with('success', 'Sarana berhasil ditambahkan.');
    }

    public function edit(Sarana $sarana)
    {
        return view('admin.sarana.edit', compact('sarana'));
    }

    public function update(Request $request, Sarana $sarana)
    {
        $request->validate([
            'nama'      => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kondisi'   => 'required|string',
            'jumlah'    => 'required|integer|min:1',
            'gambar'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except('gambar');
        if ($request->hasFile('gambar')) {
            if ($sarana->gambar) Storage::disk('public')->delete($sarana->gambar);
            $data['gambar'] = $request->file('gambar')->store('sarana', 'public');
        }

        $sarana->update($data);
        return redirect()->route('admin.sarana.index')->with('success', 'Sarana berhasil diperbarui.');
    }

    public function destroy(Sarana $sarana)
    {
        if ($sarana->gambar) Storage::disk('public')->delete($sarana->gambar);
        $sarana->delete();
        return redirect()->route('admin.sarana.index')->with('success', 'Sarana berhasil dihapus.');
    }
}
