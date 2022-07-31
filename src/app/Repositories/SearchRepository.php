<?php

namespace App\Repositories;

use App\{Models\City, Models\Route};
use Illuminate\Database\Eloquent\Collection;
use RuntimeException;

class SearchRepository
{
    /**
     * @param City $startPoint
     * @param City $endPoint
     * @return mixed
     */
    public function searchInRoutes(City $startPoint, City $endPoint): mixed
    {
        $route = Route::where('from_city', $startPoint->id)
            ->where('to_city', $endPoint->id)
            ->first();

        if (!$route) {
            throw new RuntimeException('No route found');
        }

        return $route;

    }

    /**
     * @param Route $route
     * @return Collection
     */
    public function getAvailableSeats(Route $route): Collection
    {
        return $route->seats
            ->where('available', false);
    }
}
