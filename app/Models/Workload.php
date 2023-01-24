<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workload extends Model
{
    use HasFactory;

    protected $fillable = [
        'colaborator_id',
        'colaborator_days',
        'promotion_days',
        'national_days',
        'campus_days',
        'delivery_days',
        'project_weeks',
        'project_total',
        'project_guidance',
        'project_days'
    ];

    public function colaborator()
    {
        return $this->belongsTo(Colaborator::class);
    }
}
