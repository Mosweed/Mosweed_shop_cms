<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping_methods extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'enabled',
        'image',
        'type',
        'cost',
        'min_order_amount',

    ];

    public function orders()
    {
        return $this->hasMany(Orders::class, 'shipping_method', 'id');
    }
}
