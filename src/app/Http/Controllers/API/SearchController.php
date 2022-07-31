<?php

namespace App\Http\Controllers\API;

use App\{Http\Controllers\Controller, Http\Resources\SeatsResources, Models\City, Repositories\SearchRepository};
use Illuminate\Http\JsonResponse;

class SearchController extends Controller
{

    /**
     * SearchRepository constructor.
     * @param SearchRepository $repository
     */
    public function __construct(private SearchRepository $repository)
    {
    }

    /**
     * @param City $startPoint
     * @param City $endPoint
     * @return JsonResponse
     */
    public function searchForTrips(City $startPoint, City $endPoint): JsonResponse
    {
        $route = $this->repository->searchInRoutes($startPoint, $endPoint);
        return response()->json([
            'data' => [
                'route' => $route->id,
                'seats' =>  SeatsResources::collection($this->repository->getAvailableSeats($route))
            ]
        ]);
    }
}
