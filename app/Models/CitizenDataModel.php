<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CitizenDataModel extends Model
{
    use HasFactory;

    protected $table = 'citizen_data';
    protected $primaryKey = 'citizen_data_id';

    protected $fillable = [
        'citizen_data_id',
        'family_id',
        'health_id',
        'wealth_id',
        'name',
        'gender',
        'maritial_status',
        'birth_place',
        'birth_date',
        'religion',
        'address_ktp',
        'address_domisili',
        'phone_number',
        'is_archived',
        'is_verified'
    ];

    public function family()
    {
        return $this->belongsTo(FamilyModel::class, 'family_id', 'family_id');
    }

    public function health()
    {
        return $this->belongsTo(HealthModel::class, 'health_id', 'health_id');
    }

    public function wealth()
    {
        return $this->belongsTo(WealthModel::class, 'wealth_id', 'wealth_id');
    }

    public function user()
    {
        return $this->belongsTo(CitizenUserModel::class, 'citizen_user_id', 'citizen_user_id');
    }
}
