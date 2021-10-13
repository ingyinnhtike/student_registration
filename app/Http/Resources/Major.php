<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Major extends JsonResource
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
            'id'=>$this->id,
            'name'=>$this->name,
            'name_en'=>$this->name_en,
        ];
    }
}
