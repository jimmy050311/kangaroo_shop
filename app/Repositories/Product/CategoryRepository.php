<?php

namespace App\Repositories\Product;

use App\Interfaces\Product\CategoryInterface;
use App\Models\Category;
use App\Repositories\Repository;
use Illuminate\Database\Eloquent\Model;

class CategoryRepository extends Repository implements CategoryInterface
{
    public function module(): Model
    {
        return app(Category::class);
    }

    public function searchAll($params)
    {
        return $this->module()->orderBy('sort', 'asc')->get();
    }

    public function deleteAll()
    {
        $this->module()->truncate();
    }
}