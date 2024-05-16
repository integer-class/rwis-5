<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthModel extends Model
{
    use HasFactory;

    protected $table = 'health_data';
    protected $primaryKey = 'health_id';

    protected $fillable = [
        'health_id',
        'blood_type',
        'height',
        'weight',
        'disability',
        'disease'
    ];

    public function citizen_data()
    {
        return $this->hasOne(CitizenDataModel::class, 'health_id', 'health_id');
    }

}
