<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CitizenDataModel extends Model
{
    use HasFactory;

    protected $table = 'citizen_data';
    protected $primaryKey = 'nik';

    protected $fillable = [
        'citizen_id',
        'citizen_user_id',
        'family_id',
        'health_id',
        'wealth_id',
        'nama',
        'tanggal_lahir',
        'golongan_darah',
        'status_domisili',
        'status_pernikahan',
        'jenis_kelamin',
        'agama',
        'pekerjaan',
    ];

    public function family()
    {
        return $this->belongsTo(FamilyModel::class, 'family_id', 'family_id');
    }

    public function health()
    {
        return $this->belongsTo(HealthModel::class, 'health_id', 'health_id');
    }

    public function citizen_user()
    {
        return $this->belongsTo(CitizenUserModel::class, 'citizen_user_id', 'citizen_user_id');
    }

    public function wealth()
    {
        return $this->belongsTo(WealthModel::class, 'wealth_id', 'wealth_id');
    }
}
