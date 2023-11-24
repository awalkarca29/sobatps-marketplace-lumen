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
            'buyer_id' => $this->buyer->id,
            'buyer_isAdmin' => $this->buyer->isAdmin,
            'buyer_username' => $this->buyer->username,
            'buyer_name' => $this->buyer->name,
            'buyer_email' => $this->buyer->email,
            'buyer_address' => $this->buyer->address,
            'buyer_city' => $this->buyer->city,
            'buyer_phone' => $this->buyer->phone,
            'buyer_image' => $this->buyer->image,
            'seller_id' => $this->product->user->id,
            'seller_isAdmin' => $this->product->user->isAdmin,
            'seller_username' => $this->product->user->username,
            'seller_name' => $this->product->user->name,
            'seller_email' => $this->product->user->email,
            'seller_address' => $this->product->user->address,
            'seller_city' => $this->product->user->city,
            'seller_phone' => $this->product->user->phone,
            'seller_image' => $this->product->user->image,
            'product_id' => $this->product->id,
            'product_category_id' => $this->product->category->id,
            'product_title' => $this->product->title,
            'product_slug' => $this->product->slug,
            'product_excerpt' => $this->product->excerpt,
            'product_description' => $this->product->description,
            'product_source' => $this->product->source,
            'product_function' => $this->product->function,
            'product_price' => $this->product->price,
            'product_image' => $this->product->image,
            'product_stock' => $this->product->stock,
            'product_isSold' => $this->product->isSold,
            'product_published_at' => $this->product->published_at,
            'product_created_at' => $this->product->created_at->format("d M Y"),
            'product_updated_at' => $this->product->updated_at->format("d M Y"),
            'status' => $this->status,
            'price' => $this->price,
            'quantities' => $this->quantities,
            'created_at' => $this->created_at->format("d M Y"),
            'updated_at' => $this->updated_at->format("d M Y"),
        ];
    }
}
