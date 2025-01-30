<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'firstname',
        'lastname',
        'email',
        'phonenumber',
        'session_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function addresses()
    {
        return $this->hasMany(Address::class, 'customer_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Orders::class, 'customer_id', 'id');
    }
}
