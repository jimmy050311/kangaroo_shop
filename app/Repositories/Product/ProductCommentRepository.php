<?php

namespace App\Repositories\Product;
use App\Interfaces\Product\ProductCommentInterface;
use App\Models\ProductComment;
use App\Repositories\Repository;
use Illuminate\Database\Eloquent\Model;

class ProductCommentRepository extends Repository implements ProductCommentInterface
{
    public function module(): Model
    {
        return app(ProductComment::class);
    }

    public function searchByProductId($params)
    {
        return $this->module()
            ->where('product_id', $params['product_id'])
            ->orderBy('created_at', 'desc')
            ->get();
    }
}