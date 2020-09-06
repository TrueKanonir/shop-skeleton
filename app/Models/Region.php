<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Region extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'regions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'iso_code',
        'country_id',
        'sort_order',
        'is_active'
    ];

    /**
     * Translatable keys
     *
     * @var array
     */
    protected $translatable = [
        'name'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_active' => 'bool',
        'country_id' => 'int',
        'sort_order' => 'int'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'capital'
    ];

    /**
     * The model's attributes.
     *
     * @var array
     */
    protected $attributes = [
        'is_active' => 0,
        'sort_order' => 0
    ];

    /**
     * @param string $value
     * @return void
     */
    public function setIsoCodeAttribute(string $value): void
    {
        $this->attributes['iso_code'] = Str::upper($value);
    }

    /**
     * @return \App\Models\City|null
     */
    public function getCapitalAttribute(): ?City
    {
        return $this->cities->where('is_capital', 1)->first();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id')
            ->withDefault();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }
}
