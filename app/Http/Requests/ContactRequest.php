<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Exceptions\HttpResponseException;

class ContactRequest extends FormRequest
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
            'phone' => 'sometimes|bail|required|numeric',
            'email' => 'sometimes|bail|required|string|email',
            'subject' => 'sometimes|bail|required|string',
            'comments' => 'sometimes|bail|required|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '名稱欄位不可為空',
            'phone.required' => '聯絡電話欄位不可為空',
            'phone.numeric' => '手機欄位格式不正確',
            'email.required' => '信箱欄位不可為空',
            'email.email' => '請輸入正確的信箱格式',
            'subject.required' => '標題欄位不可為空',
            'comments.required' => '內容欄位不可為空',
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
