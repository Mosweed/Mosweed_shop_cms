<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersEmails extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = ['name', 'email'];
}
