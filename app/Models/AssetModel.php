<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetModel extends Model
{
    use HasFactory;

    protected $table = 'asset_data';
    protected $primaryKey = 'asset_id';

    protected $fillable = [
        'asset_id',
        'asset_name'
    ];

    public function wealth()
    {
        return $this->hasMany(WealthModel::class, 'asset_id', 'asset_id');
    }
}
