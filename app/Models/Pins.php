<?php

namespace App\Models;

use Clickbar\Magellan\Data\Geometries\Point;
use Database\Factories\PinsFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pins extends Model
{
    /** @use HasFactory<PinsFactory> */
    use HasFactory;

    public const string TABLE_NAME = 'pins';

    protected $table = self::TABLE_NAME;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'jeepney_route_id',
        'label',
        'geography_point',
        'is_major_hub',
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
        'geography_point' => Point::class,
    ];

    /**
     * @return BelongsTo<JeepneyRoutes, $this>
     */
    public function jeepneyRoute(): BelongsTo
    {
        return $this->belongsTo(JeepneyRoutes::class, 'jeepney_route_id');
    }
}
