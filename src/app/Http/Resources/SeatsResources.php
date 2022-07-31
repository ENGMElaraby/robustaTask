<?php

namespace App\Http\Resources;

use Illuminate\{Http\Request, Http\Resources\Json\JsonResource, Support\Collection};
use JetBrains\PhpStorm\ArrayShape;

class SeatsResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    #[ArrayShape(['id' => "mixed", 'available' => "bool"])]
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'available' => true,
        ];

    }

}
