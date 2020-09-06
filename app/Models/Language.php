<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'languages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'original_name',
        'name',
        'iso_code',
        'language_code',
        'is_active',
        'date_format',
        'date_format_full',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_active' => 'bool'
    ];

    /**
     * The model's attributes.
     *
     * @var array
     */
    protected $attributes = [
        'is_active'
    ];

    /**
     * @param string $value
     * @return void
     */
    public function setIsoCodeAttribute(string $value): void
    {
        $this->attributes['iso_code'] = Str::lower($value);
    }

    /**
     * @param string $value
     * @return void
     */
    public function setLanguageCodeAttribute(string $value): void
    {
        $this->attributes['language_code'] = Str::lower($value);
    }

    /**
     * @return \Illuminate\Support\Collection
     * @throws \Exception
     */
    public static function getCached(): Collection
    {
        return cache()->rememberForever(self::class, function () {
            return $this->where('is_active', 1)
                ->orderByRaw('FIELD(iso_code, "' . config('app.locale') . '") DESC')
                ->get();
        });
    }
}
