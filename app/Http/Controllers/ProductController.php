<?php

namespace App\Http\Controllers;

use App\Interfaces\ProductRepositoryInterface;
use App\Enums\ProductStatusEnum;
use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productRepository;
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function index()
    {
        $products = $this->productRepository->all();
        return response()->json([
            'status' => 'success',
            'message' => 'Products fetched successfully',
            'data' => ProductResource::collection($products)
        ]);
    }
    public function store(StoreProductRequest $request)
    {
        $product = $this->productRepository->create([
            'name' => $request->name,
            'price' => $request->price,
            'status' => $request->status
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'Product created successfully',
            'data' => new ProductResource($product)
        ]);
    }
}
