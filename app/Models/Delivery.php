<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $fillable = [
        "workload_id",
        "colaborator_id",
        "project_id",
        "nr_hours",
        "days",
    ];

    public function colaborator()
    {
        return $this->belongsTo(Colaborator::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function workload()
    {
        return $this->belongsTo(Workload::class);
    }
}
