<?php

namespace App\Http\Controllers\API;

use App\{Http\Controllers\Controller,
    Http\Requests\BookingRequest,
    Repositories\BookingRepository};
use Illuminate\Http\JsonResponse;

class BookingController extends Controller
{

    /**
     * BookingController constructor.
     * @param BookingRepository $repository
     */
    public function __construct(private BookingRepository $repository)
    {
    }

    /**
     * @param BookingRequest $request
     * @return JsonResponse
     */
    public function bookTrip(BookingRequest $request): JsonResponse
    {
        $this->repository->booking($request->validated());
        return response()->json([
            'message' => 'Successfully booked trip!',
        ]);
    }
}
