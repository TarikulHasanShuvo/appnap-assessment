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
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function storeProduct($request)
    {
        $product = $request->all();
        if ($request->image) $product['image'] = self::storeImage($request);
        Product::create($product);
        return self::getProducts();
    }

    /**
     * @param $request
     * @param $id
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function updateProduct($request, $id)
    {
        $product = Product::find($id);
        $updateProduct = $request->all();
        if ($request->image) $updateProduct['image'] = self::storeImage($request, $product->image);
        $product->update($updateProduct);
        return self::getProducts();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function deleteProduct($id)
    {
        $product = Product::find($id);
        if ($product->image) self::deleteImage($product->image);
        $product->delete();
        return self::getProducts();
    }

    /**
     * @param $request
     * @param $old_avatar
     * @return string|null
     */
    public function storeImage($request, $old_avatar = null)
    {
        self::makeDirectory();
        $imageName = time() . '.' . $request->image->extension();
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
        if ($old_avatar && Storage::disk('public')->exists('products/' . $old_avatar)) {
            Storage::disk('public')->delete('products/' . $old_avatar);
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
