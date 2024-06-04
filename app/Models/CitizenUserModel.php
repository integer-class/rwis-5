<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class CitizenUserModel extends Authenticatable
{
    use HasFactory;

    protected $table = 'citizen_user_data';
    protected $primaryKey = 'nik';

    protected $fillable = [
        'nik',
        'name',
        'no_rt',
        'level',
        'password'
    ];

    public function citizen_data()
    {
        return $this->hasOne(CitizenDataModel::class, 'nik', 'nik');
    }

}
