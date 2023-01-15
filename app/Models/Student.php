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

    protected function days(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->getDaysFromType()
        );
    }

    public function getDaysFromType() {
        $VE_PRESENTIEL = 4;
        $VE_DISTANCE   = 1.5;
        $EI            = 2;
        $SS_PRESENTIEL = 4;
        $SS_DISTANCE   = 1.5;

        switch ($this->promotion->promotion_type_id)
        {
            case 1:
                return ($VE_PRESENTIEL + $EI + $VE_DISTANCE) * $this->nr_students;
            case 2:
                return ($VE_PRESENTIEL + $VE_DISTANCE) * $this->nr_students;
            case 3:
                return $EI * $this->nr_students;
            default:
                return 0;
        }        
    }
}
