<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productService;

    public function __construct()
    {
        $this->productService = new ProductService();
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $products = $this->productService->getProducts();
        return response()->json(['products' => $products, 'status' => 200]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * @param ProductStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ProductStoreRequest $request)
    {
        $product = $request->all();
        if ($request->image) $product['image'] = $this->productService->storeImage($request);
        Product::create($product);
        $products = $this->productService->getProducts();
        return response()->json(['products' => $products, 'message' => 'Product Store Successfully', 'status' => 200]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }


    public function update(ProductStoreRequest $request, $id)
    {
        $product = Product::find($id);
        $updateProduct = $request->all();
        if ($request->image) $updateProduct['image'] = $this->productService->storeImage($request, $product->image);
        $product->update($updateProduct);
        $products = $this->productService->getProducts();
        return response()->json(['products' => $products, 'message' => 'Product Updated Successfully', 'status' => 200]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product->image) $this->productService->deleteImage($product->image);
        $product->delete();
        $products = $this->productService->getProducts();
        return response()->json(['products' => $products, 'message' => 'Product Delete Successfully', 'status' => 200]);
    }
}
