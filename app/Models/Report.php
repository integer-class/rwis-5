<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'alamat', 'judul_laporan', 'tanggal', 'image', 'status'
    ];

    const STATUS_PENDING = 'Menunggu Verifikasi';
    const STATUS_ACCEPTED = 'accepted';
    const STATUS_REJECTED = 'rejected';
    const STATUS_ARCHIVED = 'archived';
}
