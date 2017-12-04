<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Property extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'real_states' => RealState::make($this->whenLoaded('unity')),
            'type' => $this->type,
            'description' => $this->description,
            'address' => $this->address
        ];
    }
}
