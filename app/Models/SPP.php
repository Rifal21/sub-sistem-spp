<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SPP extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_siswa',
        'kelas',
        'jumlah_tagihan',
        'jatuh_tempo',
        'status',
        'email',
        'whatsapp',
    ];
}
