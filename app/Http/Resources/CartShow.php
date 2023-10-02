<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartShow extends JsonResource
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
            'status' => $this->status,
            'quantities' => $this->quantities,
            'price' => $this->price,
            'created_at' => $this->created_at->format("d M Y"),
            'updated_at' => $this->updated_at->format("d M Y"),
            'user_id' => $this->user->id,
            'user_isAdmin' => $this->user->isAdmin,
            'user_username' => $this->user->username,
            'user_name' => $this->user->name,
            'user_email' => $this->user->email,
            'user_address' => $this->user->address,
            'user_city' => $this->user->city,
            'user_phone' => $this->user->phone,
            'user_image' => $this->user->image,
            'product_id' => $this->product->id,
            'product_category' => json_decode($this->product->category),
            'product_name' => $this->product->name,
            'product_description' => $this->product->description,
            'product_price' => $this->product->price,
            'product_image' => $this->product->image,
            'product_isSold' => $this->product->isSold,
            'product_created_at' => $this->product->created_at->format("d M Y"),
            'product_updated_at' => $this->product->updated_at->format("d M Y"),
            'seller_id' => $this->product->user->id,
            'seller_isAdmin' => $this->product->user->isAdmin,
            'seller_username' => $this->product->user->username,
            'seller_name' => $this->product->user->name,
            'seller_email' => $this->product->user->email,
            'seller_address' => $this->product->user->address,
            'seller_city' => $this->product->user->city,
            'seller_phone' => $this->product->user->phone,
            'seller_image' => $this->product->user->image,
        ];
    }
}
