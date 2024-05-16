<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyModel extends Model
{
    use HasFactory;

    protected $table = 'family_data';
    protected $primaryKey = 'family_id';

    protected $fillable = [
        'family_id',
        'family',
        'address',
        'rt',
        'rw',
        'village',
        'sub_district',
        'city',
        'province',
        'postal_code'
    ];

    public function citizen_data()
    {
        return $this->hasMany(CitizenDataModel::class, 'family_id', 'family_id');
    }
}
