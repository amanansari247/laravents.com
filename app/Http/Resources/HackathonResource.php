<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HackathonResource extends JsonResource
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
            'slug' => $this->slug,
            'title' => $this->title,
            'website' => $this->website,
            'header_image' => $this->header_image,
            'lat' => $this->lat,
            'lon' => $this->lon,
            'address' => $this->address,
            'country' => $this->country,
            'city' => $this->city,
            'state' => $this->state,
            'description' => $this->description,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'user_id' => $this->user_id,
            'user' => UserResource::make($this->user)
        ];
    }
}
