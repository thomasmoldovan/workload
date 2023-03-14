<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        "workload_id",
        "colaborator_id",
        "promotion_id",
        "nr_students",
        "days",
    ];

    public function colaborator()
    {
        return $this->belongsTo(Colaborator::class);
    }

    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }

    public function workload()
    {
        return $this->belongsTo(Workload::class);
    }

    public function promotion_type() {
        return $this->hasOneThrough(
            PromotionType::class, Promotion::class,
            'id',                 'id',
            'promotion_id',       'promotion_type_id');
    }

    protected function days(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->getDaysFromType()
        );
    }

    public function getDaysFromType() 
    {
        $promotionType = PromotionType::find($this->promotion->promotion_type_id);

        return $promotionType->ve_present + $promotionType->ve_distance + $promotionType->ei + $promotionType->ss_present + $promotionType->ss_distance;      
    }
}
