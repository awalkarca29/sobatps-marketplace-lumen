<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductShow extends JsonResource
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
            'user' => [
                'user_id' => $this->user->id,
                'user_isAdmin' => $this->user->isAdmin,
                'user_username' => $this->user->username,
                'user_name' => $this->user->name,
                'user_email' => $this->user->email,
                'user_address' => $this->user->address,
                'user_city' => $this->user->city,
                'user_phone' => $this->user->phone,
                'user_image' => $this->user->image,
            ],
            'category_id' => $this->category->id,
            'title' => $this->title,
            'description' => $this->description,
            'source' => $this->source,
            'function' => $this->function,
            'stock' => $this->stock,
            'published_at' => $this->published_at,
            'price' => $this->price,
            'image' => $this->image,
            'isSold' => $this->isSold,
            'created_at' => $this->created_at->format("d M Y"),
            'updated_at' => $this->updated_at->format("d M Y"),
        ];
    }
}
