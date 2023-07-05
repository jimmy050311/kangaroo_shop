<?php

namespace App\Http\Controllers\Frontend\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Product\ProductService;
use App\Http\Resources\ProductResource;
use Exception;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    private $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    public function loadView($id) {
        $data = $this->service->searchById($id);
        
        return view('/shop/shop-detail', [
            'product_data' => (new ProductResource($data))->resolve()]);
    }

    public function index(Request $request): JsonResponse
    {
        try {
            $data = $this->service->frontendSearch($request->all());
            $dataPage = (int)$this->service->total((int)$request->paginate);

            $response = [
                'success' => 200,
                'message' => '成功',
                'dataPage' => $dataPage,
                'data' => $data
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
                'data' => new ProductResource($data)
            ];

        }catch(Exception $e) {
            $reponse = [
                'success' => 400,
                'message' => $e->getMessage()
            ];
        }

        return response()->json($response, $response['success']);
    }
}
