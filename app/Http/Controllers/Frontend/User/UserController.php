<?php

namespace App\Http\Controllers\Frontend\User;

use App\Services\User\UserService;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    private $service;
    public function __construct(UserService $service)
    {
        $this->service = $service;
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
                'success' => 200,
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
                'message' => '修改成功',
            ];

        }catch(Exception $e) {
            $response = [
                'success' => 400,
                'message' => $e->getMessage()
            ];
        }

        return response()->json($response, $response['success']);
    }

    public function changePassword($id, PasswordRequest $request): JsonResponse
    {
        try {

            $this->service->changePassword($id, $request->all());
            $response = [
                'success' => 200,
                'message' => '密碼修改成功'
            ];

        }catch(Exception $e) {
            $response = [
                'success' => 400,
                'message' => $e->getMessage()
            ];
        }

        return response()->json($response, $response['success']);
    }

    public function login(LoginRequest $request): JsonResponse
    {
        try {

            $user = $this->service->searchByAccount($request->account, $request->password);

            Session::put('user', $user->id);
            Session::save();

            $response = [
                'success' => 200,
                'message' => '登入成功'
            ];

        }catch(Exception $e) {
            $response = [
                'success' => 400,
                'message' => $e->getMessage()
            ];
        }

        return response()->json($response, $response['success']);
    }

    public function logout(): JsonResponse
    {
        try {

            Session::flush();
            
            $response = [
                'success' => '200',
                'message' => '登出成功',
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
