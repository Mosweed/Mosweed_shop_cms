<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class API_configration extends Model
{
    use HasFactory;

    protected $table = 'api_configrations';

    protected $fillable = ['key', 'value'];

    public static function getValue($key, $default = null)
    {
        $setting = static::where('key', $key)->first();

        return $setting ? $setting->value : $default;
    }

    public static function setValue($key, $value)
    {
        return static::updateOrCreate(['key' => $key], ['value' => $value]);
    }
}
