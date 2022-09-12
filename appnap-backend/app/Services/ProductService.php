<?php

namespace App\Services;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getProducts()
    {
        $products = Product::query()->with('category')->latest()->get();

        return ProductResource::collection($products);
    }

    /**
     * @param $request
     * @param $old_avatar
     * @return string|null
     */
    public function storeImage($request, $old_avatar = null)
    {
        self::makeDirectory();
        $imageName = time().'.'.$request->image->extension();
        $request->image->storeAs('public/products', $imageName);
        if ($old_avatar) self::deleteImage($old_avatar);
        return $imageName ?? null;
    }

    /**
     * @param $old_avatar
     * @return void
     */
    public function deleteImage($old_avatar)
    {
        if ($old_avatar && Storage::disk('public')->exists('products/'.$old_avatar)) {
            Storage::disk('public')->delete('products/'.$old_avatar);
        }
    }

    /**
     * @return void
     */
    public function makeDirectory()
    {
        if (!Storage::disk('local')->exists('products')) {
            Storage::disk('local')->makeDirectory('products');
        }
    }

}
