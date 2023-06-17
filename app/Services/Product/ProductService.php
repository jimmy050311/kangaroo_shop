<?php

namespace App\Services\Product;

use App\Repositories\Product\ProductCategoryRelationRepository;
use App\Repositories\Product\ProductImageRepository;
use App\Repositories\Product\ProductRepository;
use App\Services\Service;
use Exception;
use Illuminate\Support\Facades\Storage;

class ProductService extends Service
{
    protected $repository;
    protected $productCategoryRelationRepository;
    protected $productImageRepository;

    public function __construct(
        ProductRepository $repository,
        ProductCategoryRelationRepository $productCategoryRelationRepository,
        ProductImageRepository $productImageRepository)
    {
        $this->repository = $repository;
        $this->productCategoryRelationRepository = $productCategoryRelationRepository;
        $this->productImageRepository = $productImageRepository;
    }

    public function add($params)
    {
        if(count($params['imageData']) == 0) {
            throw new Exception('圖片不可為空');
        }

        $productImg = [];
        foreach($params['imageData'] as $image) {
            $fileName = "img_".time().rand(10000,99999).".png";
            $imgBase64 = mb_split(",", $image['image'])[1];
            Storage::disk('public')->put(
                $fileName,
                base64_decode($imgBase64)
            );
            $productImg[] = $fileName;
        }

        $data = $this->repository->add([
            'name' => $params['name'],
            'number' => $params['number'],
            'introduction' => $params['introduction'],
            'description' => $params['description'],
            'spec' => $params['spec'],
            'image' => $productImg[0],
            'amount' => 0,
            'origin_price_aud' => $params['origin_price_aud'],
            'real_price_aud' => $params['real_price_aud'],
            'origin_price_twd' => $params['origin_price_twd'],
            'real_price_twd' => $params['real_price_twd'],
            'category_id' => $params['category_id'],
            'status' => $params['status'],
            'rate' => $params['rate'],
            'profit' => $params['profit'],
        ]);
        
        $this->productCategoryRelationRepository->add([
            'product_id' => $data->id,
            'category_id' => $params['category_id']
        ]);
        
        foreach($productImg as $item) {
            $this->productImageRepository->add([
                'product_id' => $data->id,
                'image' => $item,
                'sort' => 0
            ]);
        }
    }

    public function edit($id, $params)
    {
        if(count($params['imageData']) == 0) {
            throw new Exception('圖片不可為空');
        }
        $productImg = [];
        foreach($params['imageData'] as $image) {
            if(strpos($image['image'], "/storage")) {
                $path = mb_split("storage/", $image['image'])[1];
                $productImg[] = $path;
            }else {
                $fileName = "img_".time().rand(10000,99999).".png";
                $imgBase64 = mb_split(",", $image['image'])[1];
                Storage::disk('public')->put(
                    $fileName,
                    base64_decode($imgBase64)
                );
                $productImg[] = $fileName;
            }
        }

        $data = $this->repository->edit($id, [
            'name' => $params['name'],
            'number' => $params['number'],
            'introduction' => $params['introduction'],
            'description' => $params['description'],
            'spec' => $params['spec'],
            'image' => $productImg[0],
            'amount' => 0,
            'origin_price_aud' => $params['origin_price_aud'],
            'real_price_aud' => $params['real_price_aud'],
            'origin_price_twd' => $params['origin_price_twd'],
            'real_price_twd' => $params['real_price_twd'],
            'category_id' => $params['category_id'],
            'status' => $params['status'],
            'rate' => $params['rate'],
            'profit' => $params['profit'],
        ]);
        $this->productCategoryRelationRepository->del($id);
        $this->productCategoryRelationRepository->add([
            'product_id' => $id,
            'category_id' => $params['category_id']
        ]);

        $this->productImageRepository->del($id);
        foreach($productImg as $index => $item) {
            $this->productImageRepository->add([
                'product_id' => $id,
                'image' => $item,
                'sort' => 0
            ]);
        }
    }
}