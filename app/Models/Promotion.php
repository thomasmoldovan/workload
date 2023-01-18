<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'promotion_type_id',
        'presence_weeks',
        'presence_days',
        'enterprise_weeks',
        'enterprise_days'

    ];

    public function colaborators()
    {
        return $this->belongsTo(Colaborator::class);
    }

    public function promotion_types()
    {
        return $this->belongsTo(PromotionType::class, 'promotion_type_id', 'id');
    }
}
