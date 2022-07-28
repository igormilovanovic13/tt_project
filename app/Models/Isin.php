<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Isin extends Model
{
    use HasFactory;

    protected $table = 'isin';

    public function titleInfoData()
    {
        return $this->belongsTo(TitleInfoData::class, 'TitleInfoDataID', 'TitleInfoDataID');
    }
}
