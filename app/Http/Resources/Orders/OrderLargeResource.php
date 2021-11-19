<?php

namespace App\Http\Resources\Orders;

use App\Models\Order;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderLargeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       
        $order_count = Order::where('user_id',$this->user->id)->count();
        
        return [
            'id' => $this->id,
            'user' => [
               'username' => $this->user->name,
               'mobile' => $this->user->mobile,
               'avatar' => asset($this->user->avatar),
               'order_count' => $order_count,
            ],
            'name' => $this->name,
             'city' => $this->city->name,
             'country' => $this->country->name,
             'realestate_type_id' => $this->realestateType->name,
             'contract_type_id' => $this->contractType->name,
            'price' => $this->price,
            'space' => $this->space,
            'number_building' => $this->number_building,
            'street_width' => $this->street_width,
            'street_number' => $this->street_number,
            'view' => $this->view->name,
            'neighborhood' => $this->neighborhood->name ?? "",
            'age_building' => $this->age_building,
            'video_url' => $this->video_url,
            'elevator' => (Boolean)$this->elevator,
            'parking' => (Boolean)$this->parking,
            'ac' => (Boolean)$this->ac,
            'furniture' => (Boolean)$this->furniture,
            'note' => $this->note,
            'type' => $this->type,
            'type_of_owner' => $this->type_of_owner,
            'number_card' => $this->number_card,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'address' => $this->address,
            'number_of_views' => $this->number_of_views,
            'created_at' => $this->created_at->format('Y-m-d'),
        ];
    }
}