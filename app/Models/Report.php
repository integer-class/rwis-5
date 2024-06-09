<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'reports';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id', 'nik', 'nama', 'alamat', 'judul_laporan', 'tanggal', 'image', 'status'
    ];

    public function citizen_data()
    {
        return $this->belongsTo(CitizenDataModel::class, 'nik', 'nik');
    }
}
