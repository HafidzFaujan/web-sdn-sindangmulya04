<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    public function index()
    {
        $gurus = Guru::orderBy('urutan')->paginate(10);
        return view('admin.guru.index', compact('gurus'));
    }

    public function create()
    {
        return view('admin.guru.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'           => 'required|string|max:255',
            'jabatan'        => 'required|string|max:255',
            'nip'            => 'nullable|string|max:50',
            'mata_pelajaran' => 'nullable|string|max:255',
            'pendidikan'     => 'nullable|string|max:255',
            'foto'           => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'urutan'         => 'nullable|integer',
        ]);

        $data = $request->except('foto');
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('guru', 'public');
        }

        Guru::create($data);
        return redirect()->route('admin.guru.index')->with('success', 'Data guru berhasil ditambahkan.');
    }

    public function edit(Guru $guru)
    {
        return view('admin.guru.edit', compact('guru'));
    }

    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'nama'           => 'required|string|max:255',
            'jabatan'        => 'required|string|max:255',
            'nip'            => 'nullable|string|max:50',
            'mata_pelajaran' => 'nullable|string|max:255',
            'pendidikan'     => 'nullable|string|max:255',
            'foto'           => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'urutan'         => 'nullable|integer',
        ]);

        $data = $request->except('foto');
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('foto')) {
            if ($guru->foto) Storage::disk('public')->delete($guru->foto);
            $data['foto'] = $request->file('foto')->store('guru', 'public');
        }

        $guru->update($data);
        return redirect()->route('admin.guru.index')->with('success', 'Data guru berhasil diperbarui.');
    }

    public function destroy(Guru $guru)
    {
        if ($guru->foto) Storage::disk('public')->delete($guru->foto);
        $guru->delete();
        return redirect()->route('admin.guru.index')->with('success', 'Data guru berhasil dihapus.');
    }
}
