<?php

namespace App\Repositories\Cart;
use App\Interfaces\Cart\CartInterface;
use App\Models\Cart;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Repository;

class CartRepository extends Repository implements CartInterface
{
    public function module(): Model
    {
        return app(Cart::class);
    }

    public function searchByProductId($user_id, $product_id)
    {
        return $this->module()->where('user_id', $user_id)
            ->where('product_id', $product_id)
            ->first();
    }

    public function edit($cart_id, $amount)
    {
        $this->module()->where('id', $cart_id)
            ->update(['amount' => $amount]);
    }

    public function searchByUserId($id)
    {
        return $this->module()->where('user_id', $id)->get();
    }

    public function clearCart($params)
    {
        $this->module()->where('user_id', $params['user_id'])->delete();
    }
}