<?php

namespace App\Repository\Eloquent;

use App\Repositories\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements EloquentRepositoryInterface
{
    protected Model $model;
   
    public function __construct(Model $model){}
 
    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }
 
    public function find(int|string $id): ?Model
    {
        return $this->model->find($id);
    }
}