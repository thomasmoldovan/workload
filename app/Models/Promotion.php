<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'promotion_type_id',
        'presence_weeks',
        'presence_days',
        'enterprise_weeks',
        'enterprise_days'

    ];

    public function colaborators()
    {
        return $this->belongsTo(Colaborator::class);
    }

    public function promotion_type()
    {
        return $this->hasOne(PromotionType::class, 'id', 'promotion_type_id');
    }

    protected function days(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->presence_weeks * $this->presence_days + $this->enterprise_weeks * $this->enterprise_days        
        );
    }
}
