<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromotionType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        've_present',
        've_distance',
        'ei',
        'ss_present',
        'ss_distance'
    ];

    public function promotions()
    {
        return $this->hasMany(Promotion::class);
    }
}
