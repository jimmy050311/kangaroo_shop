<?php

namespace App\Interfaces\Cart;

use Illuminate\Database\Eloquent\Model;

interface CartInterface
{
    public function module(): Model;

    public function searchByProductId($user_id, $product_id);

    public function searchByUserId($id);

    public function clearCart($params);
}