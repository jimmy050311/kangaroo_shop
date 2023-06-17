<?php

namespace App\Http\Controllers\Sign;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\Admin\AdminService;
use Exception;
use Illuminate\Http\JsonResponse;
use Mews\Captcha\Facades\Captcha;

class SignController extends Controller
{
    private $service;
    public function __construct(AdminService $service)
    {
        $this->service = $service;
    }
    public function login(LoginRequest $request): JsonResponse
    {
        try {
            
            $user = $this->service->searchByAccount($request->account);

            if(empty($user)) {
                throw new Exception('查無此帳號');
            }

            if($user->password != $request->password) {
                throw new Exception('密碼錯誤');
            }

            if($user->status == 0) {
                throw new Exception('帳號已被停權');
            }

            $info = [
                'id' => $user->id,
                'account' => $user->account,
                'verify_id' => $user->verify_id,
            ];

            $request->session()->put('admin', $info);

            $response = [
                'success' => 200,
                'message' => '登入成功'
            ];

        } catch(Exception $e) {
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

            session()->forget('admin');

            $response = [
                'success' => 200,
                'message' => '登出成功',
            ];

        }catch(Exception $e) {
            $response = [
                'success' => 400,
                'message' => '登出成功'
            ];
        }

        return response()->json($response, $response['success']);
    }

    public function captcha(): JsonResponse
    {
        try {

            $response = [
                'success' => 200,
                'message' => '成功',
                'url' => captcha_src(),
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
