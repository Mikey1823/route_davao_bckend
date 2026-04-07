<?php

namespace App\Models;

use Database\Factories\StopFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Stop extends Model
{
    /** @use HasFactory<StopFactory> */
    use HasFactory;

    public const string TABLE_NAME = 'stops';

    protected $table = self::TABLE_NAME;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'jeepney_route_id',
        'name',
        'location',
        'order',
        'is_major_stop',
    ];

    /**
     * @var array<string, mixed>
     */
    protected $attributes = [
        'is_major_stop' => false,
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'is_major_stop' => 'boolean',
    ];

    /**
     * @return BelongsTo<JeepneyRoutes, $this>
     */
    public function jeepneyRoute(): BelongsTo
    {
        return $this->belongsTo(JeepneyRoutes::class, 'jeepney_route_id');
    }
}
