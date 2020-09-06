<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class City extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cities';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'longitude',
        'latitude',
        'iso_code',
        'region_id',
        'sort_order',
        'is_active',
        'is_capital',
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
        'is_capital' => 'bool',
        'region_id' => 'int',
        'sort_order' => 'int',
        'longitude' => 'decimal',
        'latitude' => 'decimal'
    ];

    /**
     * The model's attributes.
     *
     * @var array
     */
    protected $attributes = [
        'is_active' => 0,
        'is_capital' => 0,
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class, 'region_id')
            ->withDefault();
    }
}
