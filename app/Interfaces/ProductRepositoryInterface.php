<?php

namespace App\Interfaces;

interface ProductRepositoryInterface
{
    public function all();
    public function create(array $data);
}