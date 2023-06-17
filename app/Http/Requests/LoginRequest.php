<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Response;

class LoginRequest extends FormRequest
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
            'account' => ['bail','required'],
            'password' => ['bail','required','regex:/^[A-Za-z0-9]+$/'],
            'captcha' => 'bail|required|captcha',
        ];
    }

    public function messages() 
    {
        return [
            'account.required' => '帳號欄位不可為空',
            'account.regex' => '帳號不可含有特殊字符',
            'password.required' => '密碼不可為空',
            'password.regex' => '密碼不可含有特殊字符',
            'captcha.required' => '驗證碼不可為空',
            'captcha.captcha' => '驗證碼錯誤',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        // 取得錯誤資訊
        $responseData = [
            'status' => 400,
            'message' => $validator->errors()->first()
        ];
        // 產生 JSON 格式的 response，(422 是 Laravel 預設的錯誤 http status，可自行更換) 
        $response = response()->json($responseData, 400);
        // 丟出 exception
        throw new HttpResponseException($response);
    }
}
