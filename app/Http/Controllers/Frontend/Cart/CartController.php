<?php

namespace App\Http\Controllers\Frontend\Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use App\Services\Cart\CartService;
use Exception;
use Illuminate\Http\JsonResponse;

class CartController extends Controller
{
    private $service;

    public function __construct(CartService $service)
    {
        $this->service = $service;
    }

    public function store(Request $request): JsonResponse
    {
        try {

            $this->service->add($request->all());
            $response = [
                'success' => 200,
                'message' => '加入購物車成功'
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
            $data = $this->service->searchByUserId($id);

            $response = [
                'success' => 200,
                'message' => '成功',
                'data' => CartResource::collection($data),
                'total' => $this->service->cartTotal($id),
            ];

        }catch(Exception $e) {
            $response = [
                'success' => 400,
                'message' => $e->getMessage()
            ];
        }

        return response()->json($response, $response['success']);
    }

    public function destroy($id)
    {
        try {
            $this->service->del($id);

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

    public function clearCart(Request $request)
    {
        try {
            
            $this->service->clearCart($request->all());

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
}
