<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @method static where(string $string, mixed $id)
 * @method static find($route_id)
 */
class Route extends Authenticatable
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'bus_id',
        'from_city',
        'to_city',
    ];

    /**
     * @return HasMany
     */
    public function seats(): HasMany
    {
        return $this->hasMany(BusSeats::class);
    }
}
