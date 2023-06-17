<?php

namespace App\Services\Product;

use App\Repositories\Product\CategoryRepository;
use App\Services\Service;

class CategoryService extends Service
{
    protected $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function edit($id, $params)
    {
        if($id == 0) {
            $this->repository->deleteAll();
            foreach($params as $item) {
                $this->repository->add($item);
            }
        }else {
            if(strpos($params['image'], "storage/")) {
                return $this->repository->edit($id, [
                    'image' => mb_split("storage/", $params['image'])[1],
                    'name' => $params['name'], 
                ]);
            }else {
                return $this->repository->edit($id, [
                    'image' => $params['image'],
                    'name' => $params['name'], 
                ]);
            }
        }
    }
}