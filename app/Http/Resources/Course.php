<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Course extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'total' => $this->total ?? 0,
            'major' => new Major($this->whenLoaded('major')),
            'year' => new Year($this->whenLoaded('year'))
        ];
    }
}
