<?php

namespace App\Http\Controllers\Frontend\Category;

use App\Http\Controllers\Controller;
use App\Services\Product\CategoryService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $service;

    public function __construct(CategoryService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request): JsonResponse
    {
        try {

            $data = $this->service->searchAll($request->all());
            $response = [
                'success' => 200,
                'message' => '成功',
                'data' => $data
            ];

        }catch(Exception $e) {
            $response = [
                'success' => 200,
                'message' => $e->getMessage()
            ];
        }

        return response()->json($response, $response['success']);
    }
}
