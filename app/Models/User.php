<?php

namespace App\Models;

use App\Actions\Jetstream\HasProfilePhoto;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
// use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    // use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use SoftDeletes;
    use SoftDeletes;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'deleted_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function cart()
    {
        return $this->hasMany(Shopcart::class);
    }

    public function customer()
    {
        return $this->hasOne(Customer::class, 'user_id', 'id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role', 'id');
    }

    protected function roleName(): Attribute
    {

        return new Attribute(

            get: function () {
                $roles = Role::all();

                return $roles->where('id', $this->role)->first()?->name;
            }
        );
    }

    public function addresses()
    {
        return $this->hasManyThrough(Address::class, Customer::class, 'user_id', 'customer_id', 'id', 'id');
    }

    public function orders()
    {
        return $this->hasManyThrough(Orders::class, Customer::class, 'user_id', 'customer_id', 'id', 'id');
    }
}