<?php

namespace App\Repositories\Eloquent;

use App\Models\Product;
use App\Repositories\ProductsRepositoryInterface;
use Illuminate\Support\Collection;

class ProductsRepository extends BaseRepository implements ProductsRepositoryInterface
{
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function available(): Collection
    {
        return $this->model
            ->where('is_active', true)
            ->where('is_archived', false)
            ->get();
    }

    public function create(array $attributes) : Product
    {
        // TODO
        // $product = new $this->model;

        // $product->lastname = $attributes['name'];
        // $product->firstname = $attributes['is_active'] ?? false;
        // $product->patronymic = $attributes['is_archived'] ?? false;

        // $product->save();

        // return $product->fresh();
    }
}