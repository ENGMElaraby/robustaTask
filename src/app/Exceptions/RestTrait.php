<?php

namespace App\Exceptions;

use Illuminate\Http\Request;

trait RestTrait
{
    /**
     * Determines if request is an api call.
     * If the request URI contains '/api'.
     *
     * @param Request $request
     * @return bool
     */
    protected function isApiCall(Request $request): bool
    {
        return str_contains($request->url(), $request->getHost() . '/api');
    }

}
