<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments_methods extends Model
{
    use HasFactory;

    protected $primaryKey = 'Payments_methods_id';

    public $incrementing = false;

    protected $fillable = [
        'Payments_methods_id',
        'description',
        'image',
        'status',
        'api_token',
    ];
}
