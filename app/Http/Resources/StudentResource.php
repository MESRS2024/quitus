<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return
            [
                'uuid' => $this->uuid,
                'sitDep' => $this->sit_dep,
                'sitBf' => $this->sit_bf,
                'sitBc' => $this->sit_bc,
                'sitRu' => $this->sit_ru,
                'sitBrs' => $this->sit_brs
            ];

    }
}
