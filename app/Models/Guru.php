<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'nip', 'jabatan', 'kategori', 'mata_pelajaran',
        'pendidikan', 'foto', 'is_active', 'urutan'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
