<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductRequest extends FormRequest
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
            'name' => 'sometimes|bail|required|string',
            'number' => 'sometimes|bail|required|string',
            'category_id' => 'sometimes|bail|required|numeric',
            'rate' => 'sometimes|bail|required|numeric',
            'profit' => 'sometimes|bail|required|numeric',
            'origin_price_aud' => 'sometimes|bail|required|numeric',
            'real_price_aud' => 'sometimes|bail|required|numeric',
            'origin_price_twd' => 'sometimes|bail|required|numeric',
            'real_price_twd' => 'sometimes|bail|required|numeric',
            'spec' => 'sometimes|bail|required|string',
            'description' => 'sometimes|bail|required|string',
            'introduction' => 'sometimes|bail|required|string',
            'status' => 'sometimes|bail|required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '產品名稱不可為空',
            'number.required' => '產品編號不可為空',
            'category_id.required' => '產品類別不可為空',
            'category_id.numeric' => '產品類別格式不正確',
            'rate.required' => '匯率不可為空',
            'rate.numeric' => '匯率格式不正確',
            'profit.required' => '毛利不可為空',
            'profit.numeric' => '毛利格式不正確',
            'origin_price_aud.required' => '澳幣原價不可為空',
            'origin_price_aud.numeric' => '澳幣原價格式不正確',
            'real_price_aud.required' => '澳幣售價不可為空',
            'real_price_aud.numeric' => '澳幣售價格式不正確',
            'origin_price_twd.required' => '台幣原價不可為空',
            'origin_price_twd.numeric' => '台幣原價格式不正確',
            'real_price_twd.required' => '台幣售價不可為空',
            'real_price_twd.numeric' => '台幣售價格式不正確',
            'spec.required' => '規格不可為空',
            'description.required' => '描述不可為空',
            'introduction.required' => '商品介紹不可為空',
            'status.required' => '狀態不可為空',
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


