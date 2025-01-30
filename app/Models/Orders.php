<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'billing_firstname',
        'billing_lastname',
        'billing_email',
        'billing_bisiness_name',
        'billing_vat_number',
        'billing_country',
        'billing_city',
        'billing_address',
        'billing_zipcode',
        'billing_housenumber',
        'billing_addition',
        'billing_phonenumber',

        'shipping_firstname',
        'shipping_lastname',
        'shipping_email',
        'shipping_bisiness_name',
        'shipping_vat_number',
        'shipping_country',
        'shipping_city',
        'shipping_address',
        'shipping_zipcode',
        'shipping_housenumber',
        'shipping_addition',
        'shipping_phonenumber',

        'total',
        'date',
        'status',
        'order_note',

        'customer_id',
        'shipping_method',
        'shipping_cost',
        'pyment_method',
        'payment_status',
        'coupon_code',
        'Savings',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function shippingMethod()
    {
        return $this->belongsTo(Shipping_methods::class, 'shipping_method', 'id');
    }

    public function order_items()
    {
        return $this->hasMany(Order_items::class, 'order_id', 'id');
    }
}
