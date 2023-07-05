<?php

namespace App\Interfaces\Product;

use Illuminate\Database\Eloquent\Model;

interface ProductCommentInterface
{
    public function module(): Model;

    public function searchByProductId($params);
}