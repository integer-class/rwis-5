<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WealthModel extends Model
{
    use HasFactory;

    protected $table = 'wealth_data';
    protected $primaryKey = 'wealth_id';

    protected $fillable = [
        'wealth_id',
        'job',
        'education',
        'income',
    ];

    public function citizen_data()
    {
        return $this->hasOne(CitizenDataModel::class, 'wealth_id', 'wealth_id');
    }
}
