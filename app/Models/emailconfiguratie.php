<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class emailconfiguratie extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'name_from',
        'email_from',
        'password',
        'host',
        'port',
        'encryption',
        'status',
    ];
}
