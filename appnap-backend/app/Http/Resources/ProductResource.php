<?php

namespace App\Http\Resources;


use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'image' => $this->image ? asset('storage/products/'.$this->image) : null,
            'category_id' => $this->category_id,
            'category_name' => $this->category->name,
            'category_size' => $this->category->size,
        ];
    }
}
