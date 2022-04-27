<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'authors_id' => $this->authors_id,
            'genres_id' => $this->genres_id,
            'description' => $this->description,
            'release_date' => $this->release_date,
            'feedback' => FeedbackInBooksResource::collection($this->feedback),
            'estimations' => EstimationInBooksResource::collection($this->estimations),
        ];
    }
}
