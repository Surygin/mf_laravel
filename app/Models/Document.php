<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'url',
    ];

//    protected $casts = [
//        'date' => 'integer', // Если в БД хранится как integer
//    ];

//    public function getDateOnlyAttribute()
//    {
//        if (empty($this->date)) {
//            return '—';
//        }
//
//        try {
//            return Carbon::createFromTimestampMs((int)$this->date)->format('Y-m-d');
//        } catch (\Exception $e) {
//            return '—';
//        }
//    }
}
