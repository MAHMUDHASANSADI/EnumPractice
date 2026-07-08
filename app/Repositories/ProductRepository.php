<?php
namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    public function all()
    {
        return Product::latest()->get();
    }

    public function create(array $data)
    {
        return Product::create($data);
    }
}