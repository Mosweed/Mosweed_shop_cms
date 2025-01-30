<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coupon extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'code',
        'start_date',
        'end_date',
        'percentage',
        'fast_price',
        'use_limites_type',
        'limit',
        'is_used',

    ];
}
