<?php

namespace App\Http\Resources\Constants;

use Illuminate\Http\Resources\Json\JsonResource;

class AppSettingResource extends JsonResource
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
            'redio_live' => $this->redio_live,
            'facebook' => $this->facebook,
            'twitter' => $this->twitter,
            'instagram' => $this->instagram,
            'youtube' => $this->youtube,
            'mobile' => $this->mobile,
            'whats_app' => $this->whats_app,
            'email' => $this->email,
            'about_us' => $this->about_us,
        ];
    }
}