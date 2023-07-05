<?php

namespace App\Services\Cart;

use App\Repositories\Cart\CartRepository;
use App\Repositories\Product\ProductRepository;
use App\Services\Service;

class CartService extends Service
{
    protected $repository;
    protected $productRepository;

    public function __construct(
        CartRepository $repository,
        ProductRepository $productRepository)
    {
        $this->repository = $repository;
        $this->productRepository = $productRepository;
    }

    public function add($params)
    {
        $cart = $this->repository->searchByProductId($params['user_id'], $params['product_id']);
        if(empty($cart)) {
            $this->repository->add($params);
        }else {
            $this->repository->edit($cart->id, $cart->amount + $params['amount']);
        }
    }

    public function searchByUserId($id)
    {
        return $this->repository->searchByUserId($id);
    }

    public function cartTotal($id)
    {
        $total = 0;
        foreach($this->searchByUserId($id) as $item) {
            $productPrice = $this->productRepository->searchById($item->product_id)->real_price_twd;
            $total += $productPrice * $item->amount;
        }
        return $total;
    }

    public function clearCart($params)
    {
        $this->repository->clearCart($params);
    }

}