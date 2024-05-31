<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'nama',
        'alamat',
        'judul_laporan',
        'tanggal',
        'image',
        'status'
    ];
}
