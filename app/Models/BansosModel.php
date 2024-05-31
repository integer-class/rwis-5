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
        'citizen_data_id',
        'is_bansosable',
        'status'
    ];

    public function citizen_data()
    {
        return $this->hasOne(CitizenDataModel::class, 'citizen_data_id', 'citizen_data_id');
    }
}
