<?php

namespace App\Services\Order;

use App\Repositories\Order\OrderDetailRepository;
use App\Repositories\Order\OrderRepository;
use App\Services\Service;
use Exception;

class OrderService extends Service
{
    protected $repository;
    protected $orderDetailRepository;

    public function __construct(
        OrderRepository $repository,
        OrderDetailRepository $orderDetailRepository)
    {
        $this->repository = $repository;
        $this->orderDetailRepository = $orderDetailRepository;
    }

    public function add($params)
    {
        if(count($params['productData']) <= 0) {
            throw new Exception('購買商品不可為空');
        }
        $data = [
            'number' => $this->createNumber(),
            'user_id' => $params['user_id'],
            'price' => $params['price'],
            'discount' => $params['discount'],
            'ship' => $params['ship'],
            'total_price' => $params['total_price'],
            'total_amount' => $params['total_amount'],
            'status' => $params['status'],
            'ship_status' => $params['ship_status'],
            'remark' => $params['remark'],
        ];
        if($params['status'] == "1") {
            $data['paid_at'] = date('Y-m-d h:i:s', time());
        }
        $order = $this->repository->add($data);

        foreach($params['productData'] as $item) {
            $this->orderDetailRepository->add([
                'order_id' => $order->id,
                'product_id' => $item['data'][0]['value'],
                'name' => $item['data'][0]['label'],
                'number' => $item['data'][0]['number'],
                'image' => $item['data'][0]['image'],
                'origin_price_aud' => $item['data'][0]['origin_price_aud'],
                'real_price_aud' => $item['data'][0]['real_price_aud'],
                'origin_price_twd' => $item['data'][0]['origin_price_twd'],
                'real_price_twd' => $item['data'][0]['real_price_twd'],
                'amount' => $item['amount'],
            ]);
        }
    }


    public function createNumber()
    {
        $number = '';
        $characters = '0123456789';
        for($i = 0 ; $i < 2 ; $i++) {
            $number .= $characters[mt_rand(0, strlen($characters) - 1)]; 
        }
        $number = 'O' . date('Ymdhi', time()) .$number;
        return $number;
    }
}