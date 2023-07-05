<?php

namespace App\Services\Product;

use App\Repositories\Product\ProductCommentRepository;
use App\Services\Service;

class ProductCommentService extends Service
{
    protected $repository;

    public function __construct(ProductCommentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function searchByProductId($params)
    {
        return $this->repository->searchByProductId($params);
    }
}