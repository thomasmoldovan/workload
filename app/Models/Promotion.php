<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function colaborators()
    {
        return $this->belongsTo(Colaborator::class);
    }

    public function promotion_type()
    {
        return $this->belongsTo(PromotionType::class, 'promotion_type_id', 'id');
    }
}
