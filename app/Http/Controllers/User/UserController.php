<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Services\User\UserService;
use Exception;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    private $service;

    public function __construct(UserService $service)
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
                'data' => UserResource::collection($data)
            ];

        }catch(Exception $e) {
            $response = [
                'success' => 400,
                'message' => $e->getMessage()
            ];
        }

        return response()->json($response, $response['success']);
    }

    public function obtain(Request $request): JsonResponse
    {
        try {
            $data = $this->service->obtain($request->all());

            $response = [
                'success' => 200,
                'message' => '成功',
                'data' => UserResource::collection($data)
            ];

        }catch(Exception $e) {
            $response = [
                'success' => 400,
                'message' => $e->getMessage()
            ];
        }

        return response()->json($response, $response['success']);
    }

    public function store(UserRequest $request): JsonResponse
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
                'data' => new UserResource($data)
            ];

        }catch(Exception $e) {
            $response = [
                'success' => 400,
                'message' => $e->getMessage()
            ];
        }

        return response()->json($response, $response['success']);
    }

    public function update(UserRequest $request, $id): JsonResponse
    {
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
