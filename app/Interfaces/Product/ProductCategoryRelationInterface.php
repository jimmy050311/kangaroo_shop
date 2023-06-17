<?php

namespace App\Interfaces\Product;

use Illuminate\Database\Eloquent\Model;

interface ProductCategoryRelationInterface
{
    public function module(): Model;
}