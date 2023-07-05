<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Exceptions\HttpResponseException;

class OrderRequest extends FormRequest
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
            'user_id' => 'sometimes|bail|required|numeric',
            'price' => 'sometimes|bail|required|numeric',
            'discount' => 'sometimes|bail|required|numeric',
            'ship' => 'sometimes|bail|required|numeric',
            'total_price' => 'sometimes|bail|required|numeric',
            'total_amount' => 'sometimes|bail|required|numeric',
            'status' => 'sometimes|bail|required|numeric',
            'ship_status' => 'sometimes|bail|required|numeric',
            'remark'=> 'sometimes|bail|required|string',
            'country' => 'sometimes|bail|required|string',
            'zipcode' => 'sometimes|bail|required|numeric',
            'county' => 'sometimes|bail|required|string',
            'district' => 'sometimes|bail|required|string',
            'address' => 'sometimes|bail|required|string',
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => '會員名稱不可為空',
            'user_id.numeric' => '會員名稱格式不正確',
            'price.required' => '小計不可為空',
            'price.numeric' => '小計格式不正確',
            'discount.required' => '折扣不可為空',
            'discount.numeric' => '折扣格式不正確',
            'ship.required' => '運費不可為空',
            'ship.numeric' => '運費格式不正確',
            'total_price.required' => '總金額不可為空',
            'total_price.numeric' => '總金額格式不正確',
            'total_amount.required' => '總數量不可為空',
            'total_amount.numeric' => '總數量格式不正確',
            'status.required' => '訂單狀態不可為空',
            'status.numeric' => '訂單狀態格式不正確',
            'ship_status.required' => '貨運狀態不可為空',
            'ship_status.numeric' => '貨運狀態格式不正確',
            'remark.required'=> '備註不可為空',
            'country.required' => '國家欄位不可為空',
            'zipcode.required' => '郵遞區號欄位不可為空',
            'zipcode.numeric' => '郵遞區號欄位格式不正確',
            'county.required' => '縣市欄位不可為空',
            'district.required' => '鄉鎮市區欄位不可為空',
            'address.required' => '地址欄位不可為空',
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
