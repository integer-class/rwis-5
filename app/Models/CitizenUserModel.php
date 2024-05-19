<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class CitizenUserModel extends Authenticatable
{
    use HasFactory;

    protected $table = 'citizen_user_data';
    protected $primaryKey = 'citizen_user_id';

    protected $fillable = [
        'citizen_user_id',
        'citizen_data_id',
        'nik',
        'level',
        'password'
    ];

    public function citizen_data()
    {
        return $this->hasOne(CitizenDataModel::class, 'citizen_user_id', 'citizen_user_id');
    }

}
