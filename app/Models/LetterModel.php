<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LetterModel extends Model
{
    use HasFactory;

    protected $table = 'letter_data';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name',
        'address',
        'whatsapp_number',
        'status',
        'file_path'
    ];
}
