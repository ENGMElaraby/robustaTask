<?php

namespace App\Repositories;

use App\{Models\Route};
use RuntimeException;

class BookingRepository
{
    /**
     * @param mixed $validated
     * @return void
     */
    public function booking(mixed $validated): void
    {
        $route = $this->getRoute($validated['route_id']);
        $seats = $route->seats;
        $seats->each(function ($seat) use ($validated) {
            $this->bookingSeat($seat, $validated['seat_id']);
        });
        $route->save();
    }

    /**
     * @param $route_id
     * @return mixed
     */
    private function getRoute($route_id): mixed
    {
        $route = Route::find($route_id);
        if (!$route) {
            throw new RuntimeException('Route not found');
        }
        return $route;
    }

    /**
     * @param $seat
     * @param $seat_id
     * @return void
     */
    public function bookingSeat(&$seat, $seat_id): void
    {
        if ($seat->id === (int)$seat_id) {
            if ($seat->available) {
                throw new RuntimeException('Seat already booked');
            }
            $seat->available = true;
            $seat->save();
        }
    }
}
