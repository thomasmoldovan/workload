<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colaborator extends Model
{
    use HasFactory;

    protected $fillable = [
        'surname',
        'lastname',
        'trigramme'
    ];

    public function promotions()
    {
        return $this->hasMany(Promotion::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function deliveries()
    {
        return $this->hasMany(Delivery::class);
    }

    public function workloads()
    {
        return $this->hasMany(Workload::class);
    }
}
