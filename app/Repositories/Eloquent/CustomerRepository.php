<?php

namespace App\Repositories\Eloquent;

use App\Model\Customer;
use App\Repositories\CustomerRepositoryInterface;
use Illuminate\Support\Collection;

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
}