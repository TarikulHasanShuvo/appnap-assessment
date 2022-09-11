<?php

namespace App\Services;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    public function getProducts()
    {
        $products = Product::query()->with('category')->latest()->get();

        return ProductResource::collection($products);
    }

    public static function storeImage($old_avatar, $new_avatar)
    {
        if ($old_avatar && Storage::disk('public')->exists($old_avatar)) {
            Storage::disk('public')->delete($old_avatar);
        }
        return $new_avatar ? Storage::disk('public')->put($new_avatar, "product") : null;
    }

}
