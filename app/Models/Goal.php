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
}
