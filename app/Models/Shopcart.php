<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shopcart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'shopcartitem_price',
        'session_id',
        'options',
        'coupon_code',

    ];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    public function Coupon()
    {
        return $this->hasOne(Coupon::class, 'code', 'coupon_code');
    }
}
