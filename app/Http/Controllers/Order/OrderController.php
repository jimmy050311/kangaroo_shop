<?php

namespace App\Http\Controllers\Order;

use App\Services\Order\OrderService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderResource;

class OrderController extends Controller
{
    private $service;

    public function __construct(OrderService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request): JsonResponse
    {
        try {

            $data = $this->service->searchAll($request->all());
            $dataPage = (int)$this->service->total((int)$request->paginate);

            $response = [
                'success' => 200,
                'message' => '成功',
                'dataPage' => $dataPage,
                'data' => OrderResource::collection($data)
            ];

        }catch(Exception $e) {
            $response = [
                'success' => 400,
                'message' => $e->getMessage()
            ];
        }

        return response()->json($response, $response['success']);
    }

    public function store(OrderRequest $request): JsonResponse
    {
        try {

            $this->service->add($request->all());

            $response = [
                'success' => 200,
                'message' => '成功',
            ];

        }catch(Exception $e) {
            $response = [
                'success' => 400,
                'message' => $e->getMessage()
            ];
        }

        return response()->json($response, $response['success']);
    }

    public function show($id): JsonResponse
    {
        try {

            $data = $this->service->searchById($id);
            $response = [
                'success' => 200,
                'message' => '成功',
                'data' => new OrderResource($data)
            ];

        }catch(Exception $e) {
            $response = [
                'success' => 400,
                'message' => $e->getMessage()
            ];
        }

        return response()->json($response, $response['success']);
    }

    public function update($id, OrderRequest $request) {
        try {

            $this->service->edit($id, $request->all());
            $response = [
                'success' => 200,
                'message' => '更新成功'
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
