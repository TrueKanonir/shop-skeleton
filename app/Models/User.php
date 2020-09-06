<?php

namespace App\Models;

use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * @var array
     */
    const GENDER = [
        'male' => 'male',
        'female' => 'female'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'birthday',
        'phone',
        'email',
        'is_active',
        'currency_id',
        'language_id',
        'notifications',
        'subscriptions'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_active' => 'bool',
        'notifications' => 'bool',
        'subscriptions' => 'bool',
        'currency_id' => 'int',
        'language_id' => 'int'
    ];

    /**
     * The model's attributes.
     *
     * @var array
     */
    protected $attributes = [
        'is_active' => 0,
        'notifications' => 0,
        'subscriptions' => 0
    ];

    /**
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Get first letter of user's first name
     *
     * For instance:
     * - "John" - "J",
     * - "Mike" - "M"
     *
     * @return string
     */
    public function getFirstNameLetterAttribute(): string
    {
        return Str::ucfirst(Str::substr($this->first_name, 0, 1));
    }
}
