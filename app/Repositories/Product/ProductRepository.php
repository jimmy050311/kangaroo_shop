<?php

namespace App\Repositories\Product;

use App\Interfaces\Product\ProductInterface;
use App\Repositories\Repository;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ProductRepository extends Repository implements ProductInterface
{
    private $page;
    public function module(): Model
    {
        return app(Product::class);
    }

    public function total()
    {
        return $this->page;
    }

    public function searchAll($params)
    {
        $query = $this->module()->query()->orderBy('created_at', 'desc');
        if (isset($params['keyword']) && !is_null($params['keyword'])) {
            $keyValue = $params['keyword'];
            $query->where(function($query) use ($keyValue){
                $query->orWhere('name', 'LIKE BINARY', "%$keyValue%");
                $query->orWhere('number', 'LIKE BINARY', "%$keyValue%");
            });
        }
        if (isset($params['status']) && !is_null($params['status'])) {
            $query = $query->where($this->module()->getTable() . '.status', (int) $params['status']);
        }
        if (isset($params['start_date']) && !is_null($params['start_date'])) {
            $query = $query->where($this->module()->getTable() . '.created_at', '>=', Carbon::parse($params['start_date']));
        }
        if (isset($params['end_date']) && !is_null($params['end_date'])) {
            $query = $query->where($this->module()->getTable() . '.created_at', '<=', Carbon::parse($params['end_date'])->addDay());
        }
        if (isset($params['column']) && !is_null($params['column']) && isset($params['order']) && !is_null($params['order']) && $params['order'] != false) {
            if($params['order'] == 'ascend') {
                $query = $query->orderBy($params['column'], 'asc');
            }else if($params['order'] == 'descend') {
                $query = $query->orderBy($params['column'], 'desc');
            }
        }
        //取的符合資料
        $this->page = $query->count();
        $query = $query->paginate($params['paginate']);

        return $query;
    }

    public function frontendSearch($params)
    {
        $query = $this->module()->query()
            ->select('products.*', 'product_category_relation.product_id', 'product_category_relation.category_id', 
                'categories.name as category_name', 'categories.parent')
            ->leftJoin('product_category_relation', 'products.id', 'product_category_relation.product_id')
            ->leftJoin('categories', 'product_category_relation.category_id', 'categories.id');
        if (isset($params['status']) && !is_null($params['status'])) {
            $query = $query->where($this->module()->getTable() . '.status', (int) $params['status']);
        }
        if(isset($params['category']) && !is_null($params['category'])) {
            $query = $query
                    ->where(function($query) use ($params) {
                        $query->where('categories.parent', $params['category'])
                            ->orwhere($this->module()->getTable() . '.category_id', $params['category']);
                    });
        }
        if(isset($params['priceOrder']) && !is_null($params['priceOrder'])) {
            $query = $query->orderBy('real_price_twd', $params['priceOrder']);
        }
        $query = $query->orderBy('created_at', $params['timeOrder'] ?? 'desc');
        
        //取的符合資料
        $this->page = $query->count();
        $query = $query->paginate($params['paginate']);

        return $query;
    }
}
