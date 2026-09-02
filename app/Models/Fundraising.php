<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fundraising extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'kid_id',
        'current_amount',
        'target_amount',
        'is_active',
    ];

    protected $casts = [
        'current_amount' => 'decimal:2',
        'target_amount' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    // Связь с моделью Kid
    public function kid()
    {
        return $this->belongsTo(Kid::class);
    }

    // Проверка, достигнут ли целевой сбор
    public function isCompleted()
    {
        return $this->current_amount >= $this->target_amount;
    }

    // Процент выполнения сбора
    public function getProgressAttribute()
    {
        if ($this->target_amount == 0) {
            return 0;
        }
        return min(100, round(($this->current_amount / $this->target_amount) * 100, 2));
    }

    // Остаток до цели
    public function getRemainingAttribute()
    {
        return max(0, $this->target_amount - $this->current_amount);
    }
}
