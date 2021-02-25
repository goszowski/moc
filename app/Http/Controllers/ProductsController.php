<?php

namespace App\Http\Controllers;

use App\Repositories\Eloquent\ProductsRepository;

class ProductsController extends Controller
{
    protected ProductsRepository $productsRepository;

    public function __construct(ProductsRepository $productsRepository)
    {
        $this->productsRepository = $productsRepository;
    }

    public function available()
    {
        return $this->productsRepository->available();
    }
}
