<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Requisite extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'inn',
        'rs_number',
        'cs_number',
        'kpp',
        'bik',
        'ogrn',
        'bank',
    ];
}
