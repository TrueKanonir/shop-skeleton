<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    /**
     * Currency symbol positions
     *
     * @var array
     */
    const POSITION = [
        'left' => 'left',
        'right' => 'right'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'currencies';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'symbol',
        'name',
        'iso_code',
        'position',
        'exchange_rate',
        'is_active',
        'show_decimals',
        'auto_update',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_active' => 'bool',
        'show_decimals' => 'bool',
        'auto_update' => 'bool',
        'exchange_rate' => 'decimal'
    ];

    /**
     * The model's attributes.
     *
     * @var array
     */
    protected $attributes = [
        'is_active' => 0,
        'show_decimals' => 0,
        'auto_update' => 0
    ];

    /**
     * Modify iso code before storing
     *
     * @param string $value
     * @return void
     */
    public function setIsoCodeAttribute(string $value): void
    {
        $this->attributes['iso_code'] = Str::upper($value);
    }

    /**
     * Get cached currencies
     *
     * @return \Illuminate\Support\Collection
     * @throws \Exception
     */
    public static function getCached(): Collection
    {
        return cache()->rememberForever(self::class, function () {
            return $this->where('is_active', 1)->get();
        });
    }
}
