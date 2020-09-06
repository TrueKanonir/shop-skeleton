<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ShopLanguage extends Pivot
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'shop_id',
        'language_id',
        'sort_order',
        'is_default',
        'is_active'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'shop_id' => 'int',
        'language_id' => 'int',
        'sort_order' => 'int',
        'is_default' => 'bool',
        'is_active' => 'bool'
    ];

    /**
     * The model's attributes.
     *
     * @var array
     */
    protected $attributes = [
        'sort_order' => 0,
        'is_default' => 0,
        'is_active' => 0
    ];
}
