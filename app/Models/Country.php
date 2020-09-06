<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'countries';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'iso_code',
        'call_prefix',
        'sort_order',
        'is_active',
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
        'sort_order' => 'int',
        'call_prefix' => 'int'
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
     * @return \Illuminate\Support\Collection
     * @throws \Exception
     */
    public static function getCached(): Collection
    {
        return cache()->rememberForever(self::class, function () {
            return $this->where('is_active', 1)
                ->orderBy('sort_order', 'asc')
                ->get();
        });
    }

    /**
     * @param string $value
     * @return void
     */
    public function setIsoCodeAttribute(string $value): void
    {
        $this->attributes['iso_code'] = Str::upper($value);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function regions(): HasMany
    {
        return $this->hasMany(Region::class);
    }
}
