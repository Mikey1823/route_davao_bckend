<?php

namespace App\Models;

use Database\Factories\JeepneyRoutesFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JeepneyRoutes extends Model
{
    /** @use HasFactory<JeepneyRoutesFactory> */
    use HasFactory;

    public const string TABLE_NAME = 'jeepney_routes';

    protected $table = self::TABLE_NAME;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'route_number',
        'color_hex',
        'is_loop',
    ];

    /**
     * @var array<string, mixed>
     */
    protected $attributes = [
        'is_loop' => false,
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'is_loop' => 'boolean',
    ];

    /**
     * @return HasMany<Pins, $this>
     */
    public function pins(): HasMany
    {
        return $this->hasMany(Pins::class, 'jeepney_route_id');
    }

    /**
     * @return HasMany<Stop, $this>
     */
    public function stops(): HasMany
    {
        return $this->hasMany(Stop::class, 'jeepney_route_id');
    }
}
