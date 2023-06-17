<?php

namespace App\Http\Controllers\Contact;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ContactResource;
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

    public function index(Request $request): JsonResponse
    {
        try {

            $data = $this->service->searchAll($request->all());
            $dataPage = (int)$this->service->total((int)$request->paginate);

            $response = [
                'success' => 200,
                'message' => '成功',
                'dataPage' => $dataPage,
                'data' => ContactResource::collection($data)
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
