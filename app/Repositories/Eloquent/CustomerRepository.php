<?php

namespace App\Repositories\Eloquent;

use App\Models\Customer;
use App\Repositories\CustomerRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

class CustomerRepository extends BaseRepository implements CustomerRepositoryInterface
{
    public function __construct(Customer $model)
    {
        parent::__construct($model);
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function create(array $attributes) : Customer
    {
        $customer = new $this->model;

        $customer->lastname = $attributes['lastname'];
        $customer->firstname = $attributes['firstname'];
        $customer->patronymic = $attributes['patronymic'];
        $customer->phone = $attributes['phone'];
        $customer->password = Hash::make($attributes['password']);

        $customer->save();

        return $customer->fresh();
    }
}