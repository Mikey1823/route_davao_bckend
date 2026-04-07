<?php

namespace App\Models;

use Database\Factories\RoutePinFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RoutePin extends Model
{
    /** @use HasFactory<RoutePinFactory> */
    use HasFactory;

    public const string TABLE_NAME = 'route_pins';

    protected $table = self::TABLE_NAME;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'pin_id',
        'jeepney_route_id',
    ];

    /**
     * @var array<string, mixed>
     */
    protected $attributes = [
        // 'column' => 'default_value',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        // 'column' => 'data_type',
    ];

    /**
     * @return BelongsTo<Pins, $this>
     */
    public function pin(): BelongsTo
    {
        return $this->belongsTo(Pins::class, 'pin_id');
    }

    /**
     * @return BelongsTo<JeepneyRoutes, $this>
     */
    public function jeepneyRoute(): BelongsTo
    {
        return $this->belongsTo(JeepneyRoutes::class, 'jeepney_route_id');
    }
}
