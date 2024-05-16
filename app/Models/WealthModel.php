<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WealthModel extends Model
{
    use HasFactory;

    protected $table = 'wealth_data';
    protected $primaryKey = 'wealth_id';

    protected $fillable = [
        'wealth_id',
        'asset_id',
        'job',
        'income',
    ];

    public function citizen_data()
    {
        return $this->hasOne(CitizenDataModel::class, 'wealth_id', 'wealth_id');
    }

    public function asset()
    {
        return $this->belongsTo(AssetModel::class, 'asset_id', 'asset_id');
    }
}
