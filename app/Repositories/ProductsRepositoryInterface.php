<?php

namespace App\Repositories;

use Illuminate\Support\Collection;

interface ProductsRepositoryInterface
{
   public function all(): Collection;

   public function available(): Collection;
}