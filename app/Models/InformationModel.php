<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformationModel extends Model
{
    use HasFactory;

    protected $table = 'information_data';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'title',
        'desc',
        'date',
        'time',
        'place',
        'image',
    ];
}
