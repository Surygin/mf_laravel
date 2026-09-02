<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kid extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'name_declension',
        'last_name',
        'history',
        'avatar',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Если name_declension не заполнено, используем name
    public function getDeclensionAttribute()
    {
        return $this->name_declension ?? $this->name;
    }

    // Связь с fundraising
    public function fundraisings(): HasMany
    {
        return $this->hasMany(Fundraising::class);
    }

    // Активный сбор
    public function activeFundraising(): HasOne
    {
        return $this->hasOne(Fundraising::class)->where('is_active', true);
    }

    public function getFullNameAttribute()
    {
        return $this->name . ' ' . $this->last_name;
    }

    public function getTotalAmountsAttribute()
    {
        return $this->fundraisings()->sum('current_amount');
    }

    public function hasActiveFundraising()
    {
        return $this->fundraisings()->where('is_active', true)->exists();
    }
}
