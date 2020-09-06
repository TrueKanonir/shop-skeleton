<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Shop extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'shops';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'url',
        'country_id'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'country_id' => 'int'
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
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id')
            ->withDefault();
    }

    public function configuration()
    {
        return $this->hasMany(ShopConfiguration::class, 'shop_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function currencies(): BelongsToMany
    {
        return $this->belongsToMany(
            Currency::class,
            'shop_currency',
            'shop_id',
            'currency_id'
        )->withPivot([
            'sort_order',
            'is_active',
            'is_default'
        ])->using(ShopCurrency::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function languages(): BelongsToMany
    {
        return $this->belongsToMany(
            Language::class,
            'shop_language',
            'shop_id',
            'language_id'
        )->withPivot([
            'sort_order',
            'is_active',
            'is_default'
        ])->using(ShopLanguage::class);
    }
}
