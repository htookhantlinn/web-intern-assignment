<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'roll_no' => $this->roll_no,
            'gender' => $this->gender,
            'dob' => $this->dob,
            'nrc' => $this->nrc,
            'courses' => $this->courses->map->only('id', 'name', 'description'),
        ];
    }
}
