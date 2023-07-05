<?php

namespace App\Http\Controllers\Frontend\Contact;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Services\Contact\ContactService;
use Exception;
use Illuminate\Http\JsonResponse;

class ContactController extends Controller
{
    private $service;

    public function __construct(ContactService $service)
    {
        $this->service = $service;
    }

    public function store(ContactRequest $request): JsonResponse
    {
        try {
            $this->service->add($request->all());

            $response = [
                'success' => 200,
                'message' => '成功'
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
