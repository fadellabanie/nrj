<?php

namespace App\Http\Resources\Prodcasts;

use App\Models\MusicBasket;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\MusicBaskets\MusicBasketTinyResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $musicBaskets = MusicBasket::where('category_id',$this->id)->first();
      //  dd($musicBaskets);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'icon' => asset($this->icon),
            'radio' => new MusicBasketTinyResource($musicBaskets) ?? "",
        ];
    }
}
