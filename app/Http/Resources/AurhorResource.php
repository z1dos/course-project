<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AurhorResource extends JsonResource
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
            'id' => $this-> id,
            'author_surname' => $this-> author_surname,
            'author_name' => $this-> author_name,
            'author_patronymic' => $this-> author_patronymic,
            'date_of_birth' => $this-> date_of_birth,
            'date_of_death' => $this-> date_of_death,
        ];
    }
}
