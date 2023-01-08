<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workload extends Model
{
    use HasFactory;

    protected $fillable = [
        'colaborator_id',
        'name',
    ];

    public function colaborator()
    {
        return $this->belongsTo(Colaborator::class);
    }
}
