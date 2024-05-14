<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthModel extends Model
{
    use HasFactory;

    protected $table = 'health';
    protected $primaryKey = 'health_id';

    protected $fillable = [
        'health_id',
        'history_of_disease',
        'current_disease',
    ];

    public function citizen_data()
    {
        return $this->hasOne(CitizenDataModel::class, 'health_id', 'health_id');
    }

}
