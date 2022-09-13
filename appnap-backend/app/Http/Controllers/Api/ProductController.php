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
     * @param ProductStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ProductStoreRequest $request)
    {
        $products = $this->productService->storeProduct($request);
        return response()->json(['products' => $products, 'message' => 'Product Store Successfully', 'status' => 200]);
    }

    /**
     * @param ProductStoreRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ProductStoreRequest $request, $id)
    {
        $products = $this->productService->updateProduct($request, $id);
        return response()->json(['products' => $products, 'message' => 'Product Updated Successfully', 'status' => 200]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $products = $this->productService->deleteProduct($id);
        return response()->json(['products' => $products, 'message' => 'Product Delete Successfully', 'status' => 200]);
    }
}
