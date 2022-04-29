<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'isAdmin' => $this-> isAdmin,
            'login' => $this-> login,
            'surname' => $this-> surname,
            'name' => $this-> name,
            'patronymic' => $this-> patronymic,
            'email' => $this-> email,
            'about_me' => $this-> about_me,
            'telephon_number' => $this-> telephon_number,
            'created_at' => $this-> created_at,
        ];
    }
}
