<?php

namespace App\Http\Resources\Presenters;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PresenterCollection extends ResourceCollection
{

    public $collects = PresenterTinyResource::class;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function toArray($request)
    {
        return [
            'status' => 1,
            'message' => __('Success Request'),
            'data' => parent::toArray($request),
        ];
    }
}
