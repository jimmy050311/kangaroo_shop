<?php

namespace App\Http\Controllers\Frontend\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Services\Order\OrderService;
use Exception;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{
    private $service;

    public function __construct(OrderService $service)
    {
        $this->service = $service;
    }

    public function store(OrderRequest $request): JsonResponse
    {
        try {

            $this->service->add($request->all());
            $response = [
                'success' => 200,
                'message' => '訂單建立成功'
            ];

        }catch(Exception $e) {
            $response = [
                'success' => 400,
                'message' => $e->getMessage()
            ];
        }

        return response()->json($response, $response['success']);
    }
}
