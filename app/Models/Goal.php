<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
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

    // protected function days(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn () => $this->present_weeks * $this->present_days + $this->enterprise_weeks * $this->enterprise_days        
    //     );
    // }
}
