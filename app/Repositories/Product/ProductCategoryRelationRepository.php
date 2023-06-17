<?php

namespace App\Repositories\Product;
use App\Interfaces\Product\ProductCategoryRelationInterface;
use App\Models\ProductCategoryRelation;
use App\Repositories\Repository;
use Illuminate\Database\Eloquent\Model;

class ProductCategoryRelationRepository extends Repository implements ProductCategoryRelationInterface
{
    public function module(): Model
    {
        return app(ProductCategoryRelation::class);
    }

    public function del($id)
    {
        return $this->module()->where('product_id', $id)->delete();
    }
}