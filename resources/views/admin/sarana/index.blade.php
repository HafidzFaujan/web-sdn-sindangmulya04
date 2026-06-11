@extends('layouts.admin')
@section('title', 'Sarana & Prasarana')
@section('page-title', 'Sarana & Prasarana')
@section('content')
<div class="flex justify-between items-center mb-6">
    <p class="text-gray-500 text-sm">Total: {{ $saranas->total() }} item</p>
    <a href="{{ route('admin.sarana.create') }}" class="bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-blue-800 transition flex items-center space-x-2">
        <i class="fas fa-plus"></i><span>Tambah Sarana</span>
    </a>
</div>
<div class="bg-white rounded-2xl shadow-sm overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 text-gray-600">
            <tr>
                <th class="text-left px-4 py-3">Gambar</th>
                <th class="text-left px-4 py-3">Nama</th>
                <th class="text-left px-4 py-3">Jumlah</th>
                <th class="text-left px-4 py-3">Kondisi</th>
                <th class="text-left px-4 py-3">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($saranas as $sarana)
            <tr class="hover:bg-gray-50">
                <td class="px-4 py-3">
                    @if($sarana->gambar)
                        <img src="{{ asset('storage/' . $sarana->gambar) }}" class="w-12 h-10 rounded-lg object-cover">
                    @else
                        <div class="w-12 h-10 rounded-lg bg-green-100 flex items-center justify-center"><i class="fas fa-school text-green-400 text-xs"></i></div>
                    @endif
                </td>
                <td class="px-4 py-3 font-medium text-gray-800">{{ $sarana->nama }}</td>
                <td class="px-4 py-3 text-gray-600">{{ $sarana->jumlah }}</td>
                <td class="px-4 py-3">
                    <span class="px-2 py-1 rounded-full text-xs {{ $sarana->kondisi == 'Baik' ? 'bg-green-100 text-green-700' : ($sarana->kondisi == 'Cukup' ? 'bg-yellow-100 text-yellow-700' : 'bg-red-100 text-red-700') }}">
                        {{ $sarana->kondisi }}
                    </span>
                </td>
                <td class="px-4 py-3">
                    <div class="flex space-x-2">
                        <a href="{{ route('admin.sarana.edit', $sarana) }}" class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-lg text-xs hover:bg-yellow-200 transition"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.sarana.destroy', $sarana) }}" method="POST" onsubmit="return confirm('Hapus data ini?')">
                            @csrf @method('DELETE')
                            <button class="bg-red-100 text-red-700 px-3 py-1 rounded-lg text-xs hover:bg-red-200 transition"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="text-center py-10 text-gray-400">Belum ada data sarana</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="p-4">{{ $saranas->links() }}</div>
</div>
@endsection
