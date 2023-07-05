<?php

namespace App\Http\Controllers\Frontend\Product;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCommentRequest;
use App\Http\Resources\ProductCommentResource;
use App\Services\Product\ProductCommentService;
use Exception;

class ProductCommentController extends Controller
{
    private $service;

    public function __construct(ProductCommentService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request): JsonResponse
    {
        try {
            $data = $this->service->searchByProductId($request->all());

            $response = [
                'success' => 200,
                'message' => '成功',
                'data' => ProductCommentResource::collection($data)
            ];

        }catch(Exception $e) {
            $response = [
                'success' => 400,
                'message' => $e->getMessage()
            ];
        }

        return response()->json($response, $response['success']);
    }

    public function store(ProductCommentRequest $request): JsonResponse
    {
        try {

            $this->service->add($request->all());

            $response = [
                'success' => 200,
                'message' => '評論成功'
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
