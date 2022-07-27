<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class SecondWorkshopGroupResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'school' => $this->school->name,
            'hour' => "(".Carbon::parse($this->start_at)->format('H:i')." - ".Carbon::parse($this->end_at)->format('H:i').")",            
        ];
    }
}
