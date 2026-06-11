@extends('layouts.frontend')
@section('title', 'Tenaga Pendidik - SDN Sindangmulya 04')

@push('styles')
<style>
.guru-item {
    position: relative;
}
.guru-card-hover {
    position: fixed;
    width: 170px;
    background: white;
    border-radius: 20px;
    box-shadow: 0 25px 80px rgba(29,78,216,0.25), 0 8px 24px rgba(0,0,0,0.12);
    overflow: hidden;
    z-index: 9999;
    opacity: 0;
    pointer-events: none;
    transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    border: 3px solid #3b82f6;
    transform: scale(0.7);
}
.guru-card-hover .foto-wrap {
    width: 100%;
    height: 170px;
    overflow: hidden;
    background: linear-gradient(135deg, #dbeafe, #ede9fe);
}
.guru-card-hover .foto-wrap img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: top;
    transition: transform 0.5s ease;
}
.guru-item:hover .guru-card-hover .foto-wrap img {
    transform: scale(1.08);
}
.guru-card-hover .foto-wrap .no-foto {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}
.guru-card-hover .info {
    padding: 10px 14px 12px;
    background: linear-gradient(135deg, #1d4ed8, #3b82f6);
    text-align: center;
}
.guru-card-hover .info p {
    color: white;
    font-size: 12px;
    font-weight: 700;
    line-height: 1.4;
}
.guru-card-hover .info span {
    color: #bfdbfe;
    font-size: 10px;
}
.guru-card-hover::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    border: 10px solid transparent;
    border-top-color: #3b82f6;
    border-bottom: none;
}
/* Garis kiri biru saat hover baris */
.guru-item:hover {
    border-left: 3px solid #3b82f6;
}
</style>
@endpush

@section('content')

<div class="bg-blue-700 py-16">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h1 class="text-4xl font-bold text-white" data-aos="fade-up">Tenaga Pendidik</h1>
        <p class="text-blue-200 mt-2">SDN Sindangmulya 04 Kabupaten Bekasi</p>
    </div>
</div>

<section class="py-16 bg-gray-50">
    <div class="max-w-5xl mx-auto px-4">

        {{-- KEPALA SEKOLAH --}}
        @if($kepala)
        <div class="flex justify-center mb-14" data-aos="fade-up">
            <div class="bg-white rounded-2xl shadow-lg p-8 text-center w-72">
                <div class="w-36 h-36 rounded-full overflow-hidden mx-auto mb-4 border-4 border-blue-200 shadow-md">
                    @if($kepala->foto)
                        <img src="{{ asset('storage/' . $kepala->foto) }}" alt="{{ $kepala->nama }}" class="w-full h-full object-cover object-top">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-blue-100 to-blue-200">
                            <i class="fas fa-user-tie text-5xl text-blue-300"></i>
                        </div>
                    @endif
                </div>
                <h3 class="text-xl font-bold text-gray-800">{{ $kepala->nama }}</h3>
                @if($kepala->nip)
                <p class="text-gray-400 text-xs mt-1">NIP. {{ $kepala->nip }}</p>
                @endif
                <span class="inline-block mt-3 text-blue-700 font-semibold text-sm">Kepala Sekolah</span>
            </div>
        </div>
        @endif

        {{-- STAF & WALI KELAS --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            {{-- STAF MANAJEMEN --}}
            @if($staf->count() > 0)
            <div data-aos="fade-right">
                <div class="bg-blue-700 text-white text-center font-semibold py-3 rounded-t-xl">
                    Staf Manajemen
                </div>
                <div class="bg-white rounded-b-xl shadow-md divide-y divide-gray-100">
                    @foreach($staf as $s)
                    <div class="guru-item px-4 py-3 flex justify-between items-center hover:bg-blue-50 transition">
                        {{-- Hover Card --}}
                        <div class="guru-card-hover">
                            <div class="foto-wrap">
                                @if($s->foto)
                                    <img src="{{ asset('storage/' . $s->foto) }}" alt="{{ $s->nama }}">
                                @else
                                    <div class="no-foto"><i class="fas fa-user-tie text-5xl text-blue-300"></i></div>
                                @endif
                            </div>
                            <div class="info">
                                <p>{{ $s->nama }}</p>
                                <span>{{ $s->jabatan }}</span>
                            </div>
                        </div>
                        <span class="text-gray-800 text-sm font-medium cursor-default">{{ $s->nama }}</span>
                        <span class="bg-blue-100 text-blue-700 text-xs px-2 py-1 rounded-full ml-2 whitespace-nowrap">{{ $s->jabatan }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            {{-- WALI KELAS & GURU MAPEL --}}
            <div class="md:col-span-{{ $staf->count() > 0 ? '2' : '3' }}" data-aos="fade-left">
                <div class="bg-gray-800 text-white text-center font-semibold py-4 rounded-t-xl flex items-center justify-center space-x-2 text-base">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span>Daftar Wali Kelas & Guru Mata Pelajaran</span>
                </div>
                <div class="bg-white rounded-b-xl shadow-md overflow-y-auto overflow-x-visible" style="max-height: 420px;">
                    @if($wali->count() > 0 || $mapel->count() > 0)
                    <div class="divide-y divide-gray-100">
                        @foreach($list as $g)
                        <div class="guru-item px-5 py-4 hover:bg-blue-50 transition">
                            <div class="guru-card-hover">
                                <div class="foto-wrap">
                                    @if($g->foto)
                                        <img src="{{ asset('storage/' . $g->foto) }}" alt="{{ $g->nama }}">
                                    @else
                                        <div class="no-foto"><i class="fas fa-user-tie text-5xl text-blue-300"></i></div>
                                    @endif
                                </div>
                                <div class="info">
                                    <p>{{ $g->nama }}</p>
                                    <span>{{ $g->jabatan }}</span>
                                </div>
                            </div>
                            <div class="flex items-center space-x-3 cursor-default">
                                <i class="fas fa-user-circle text-blue-400 text-xl"></i>
                                <div>
                                    <p class="text-base font-semibold text-gray-800">{{ $g->nama }}</p>
                                    <p class="text-sm text-gray-400">{{ $g->jabatan }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="text-center py-10 text-gray-400">
                        <i class="fas fa-users text-4xl mb-2"></i>
                        <p>Data guru belum tersedia</p>
                    </div>
                    @endif
                </div>
            </div>

        </div>

        @if(!$kepala && $staf->count() === 0 && $wali->count() === 0 && $mapel->count() === 0)
        <div class="text-center py-20">
            <i class="fas fa-users text-6xl text-gray-300 mb-4"></i>
            <p class="text-gray-500 text-xl">Data guru sedang dipersiapkan</p>
        </div>
        @endif

        <p class="text-center text-gray-400 text-xs mt-8 italic">
            <i class="fas fa-hand-pointer mr-1"></i> Arahkan kursor ke nama guru untuk melihat foto
        </p>

    </div>
</section>

@push('scripts')
<script>
document.querySelectorAll('.guru-item').forEach(item => {
    const popup = item.querySelector('.guru-card-hover');
    if (!popup) return;

    item.addEventListener('mouseenter', function(e) {
        popup.style.opacity = '1';
        popup.style.transform = 'scale(1)';
        positionPopup(e, popup);
    });

    item.addEventListener('mousemove', function(e) {
        positionPopup(e, popup);
    });

    item.addEventListener('mouseleave', function() {
        popup.style.opacity = '0';
        popup.style.transform = 'scale(0.7)';
    });
});

function positionPopup(e, popup) {
    const x = e.clientX;
    const y = e.clientY;
    const pw = popup.offsetWidth || 170;
    const ph = popup.offsetHeight || 220;
    const ww = window.innerWidth;
    const wh = window.innerHeight;

    let left = x + 20;
    let top  = y - ph / 2;

    if (left + pw > ww - 10) left = x - pw - 20;
    if (top < 10) top = 10;
    if (top + ph > wh - 10) top = wh - ph - 10;

    popup.style.left = left + 'px';
    popup.style.top  = top + 'px';
}
</script>
@endpush

@endsection
