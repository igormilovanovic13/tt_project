<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TitleInfoData extends Model
{
    use HasFactory;

    protected $table = 'titleinfodata';

    public function isin() {
        return $this->hasOne(Isin::class, 'TitleInfoDataID', 'TitleInfoDataID');
    }
}
