<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CitizenUserModel extends Model
{
    use HasFactory;

    protected $table = 'citizen_user';
    protected $primaryKey = 'citizen_user_id';

    protected $fillable = [
        'citizen_user_id',
        'level_id',
        'nik',
        'password'
    ];

    public function citizen_data()
    {
        return $this->hasOne(CitizenDataModel::class, 'citizen_user_id', 'citizen_user_id');
    }

}
