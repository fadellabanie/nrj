<?php

namespace App\Http\Resources\Shows;

use Illuminate\Http\Resources\Json\JsonResource;

class ShowTinyResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'from' => $this->from,
            'to' => $this->to,
            'image' => asset($this->image),
            'presenter' => [
                'id' => $this->presenter->id,
                'name' => $this->presenter->name,
                'description' => $this->presenter->description,
                'image' => asset($this->presenter->image),
            ]
        ];
    }
}
