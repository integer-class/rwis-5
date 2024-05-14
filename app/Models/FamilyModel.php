<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyModel extends Model
{
    use HasFactory;

    protected $table = 'family';
    protected $primaryKey = 'family_id';

    protected $fillable = [
        'family_id',
        'RW_number',
        'RT_number',
    ];

    public function citizen_data()
    {
        return $this->hasMany(CitizenDataModel::class, 'family_id', 'family_id');
    }

    public function wealth()
    {
        return $this->belongsTo(WealthModel::class, 'wealth_id', 'wealth_id');
    }
}
