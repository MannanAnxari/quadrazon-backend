<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PortfolioResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'image' => $this->image ? asset(env('APP_URL') . $this->image) : null,
            'category' => new CategoryResource($this->whenLoaded('category')),
            'tags' => json_decode($this->tags, '[]'),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
