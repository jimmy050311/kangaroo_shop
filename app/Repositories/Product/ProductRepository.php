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
}
