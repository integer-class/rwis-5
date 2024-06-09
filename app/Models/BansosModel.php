<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BansosModel extends Model
{
    use HasFactory;

    protected $table = 'bansos_data';
    protected $primaryKey = 'bansos_id';

    protected $fillable = [
        'bansos_id',
        'nik',
        'is_bansosable',
        'status'
    ];

    public function citizen_data()
    {
        return $this->hasOne(CitizenDataModel::class, 'nik', 'nik');
    }
}
