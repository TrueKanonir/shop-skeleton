<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShopConfiguration extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'shop_configuration';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'shop_id',
        'key',
        'value'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'shop_id' => 'int',
        'value' => 'array'
    ];

    /**
     * The model's attributes.
     *
     * @var array
     */
    protected $attributes = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class, 'shop_id')
            ->withDefault();
    }
}
