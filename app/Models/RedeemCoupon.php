<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RedeemCoupon extends Model
{
    protected $table = 'user_coupons';

    protected $fillable = [
        'customer_id',
        'coupons_id',

    ];

    const CREATED_AT = 'redeemed_at';

    const UPDATED_AT = null;

    public function coupon()
    {
        return $this->hasOne(Coupon::class, 'id', 'coupons_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id', 'customer_id');
    }
}
