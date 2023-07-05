<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductCommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'product_id' => 'sometimes|bail|required|numeric',
            'name' => 'sometimes|bail|required|string',
            'email' => 'sometimes|bail|required|string|email',
            'comment' => 'sometimes|bail|required|string',
        ];
    }

    public function messages()
    {
        return [
            'product_id.required' => '產品不可為空',
            'product_id.numeric' => '產品格式不正確',
            'name.required' => '名稱不可為空',
            'email.required' => '信箱不可為空',
            'email.email' => '信箱格式不正確',
            'comment.required' => '信箱不可為空',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        // 取得錯誤資訊
        $responseData = [
            'success' => 400,
            'message' => $validator->errors()->first()
        ];
        // 產生 JSON 格式的 response，(422 是 Laravel 預設的錯誤 http status，可自行更換) 
        $response = response()->json($responseData, 400);
        // 丟出 exception
        throw new HttpResponseException($response);
    }
}
