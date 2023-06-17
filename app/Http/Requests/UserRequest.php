<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRequest extends FormRequest
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
            'type' => 'sometimes|bail|required|numeric',
            'account' => ['sometimes', 'bail','required',Rule::unique('admins')->ignore($this->id),'regex:/^[A-Za-z0-9]+$/'],
            'password' => ['sometimes','bail','required','regex:/^[A-Za-z0-9]+$/','confirmed'],
            'email' => 'sometimes|bail|required|string|email',
            'phone' => 'sometimes|bail|required|numeric',
            'gender' => 'sometimes|bail|required|numeric',
            'birth' => 'sometimes|bail|required',
            'status' => 'sometimes|bail|required|numeric',
            'country' => 'sometimes|bail|required|string',
            'zipcode' => 'sometimes|bail|required|numeric',
            'county' => 'sometimes|bail|required|string',
            'district' => 'sometimes|bail|required|string',
            'address' => 'sometimes|bail|required|string',
            'bank_user_name' => 'sometimes|bail|required|string',
            'bank_name' => 'sometimes|bail|required|string',
            'bank_code' => 'sometimes|bail|required|numeric',
            'branch_name' => 'sometimes|bail|required|string',
            'branch_code' => 'sometimes|bail|required|numeric',
            'bank_account' => 'sometimes|bail|required|numeric',
            'id_number' => 'sometimes|bail|required|string',
            'taxid' => 'sometimes|bail|required|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '名稱欄位不可為空',
            'type.required' => '法人/自然人欄位不可為空',
            'type.numeric' => '法人/自然人欄位格式不正確',
            'account.required' => '帳號欄位不可為空',
            'account.unique' => '此帳號已存在',
            'account.regex' => '帳號不可含有特殊字符',
            'password.required' => '密碼欄位不可為空',
            'password.regex' => '密碼不可含有特殊字符',
            'password.confirmed' => '密碼輸入不一致',
            'email.required' => '信箱欄位不可為空',
            'email.email' => '請輸入正確的信箱格式',
            'phone.required' => '手機欄位不可為空',
            'phone.numeric' => '手機欄位格式不正確',
            'gender.required' => '性別欄位不可為空',
            'gender.numeric' => '性別欄位格式不正確',
            'birth.required' => '生日欄位不可為空',
            'status.required' => '狀態欄位不可為空',
            'status.numeric' => '狀態欄位格式不正確',
            'country.required' => '國家欄位不可為空',
            'zipcode.required' => '郵遞區號欄位不可為空',
            'zipcode.numeric' => '郵遞區號欄位格式不正確',
            'county.required' => '縣市欄位不可為空',
            'district.required' => '鄉鎮市區欄位不可為空',
            'address.required' => '地址欄位不可為空',
            'bank_user_name.required' => '帳戶人名稱欄位不可為空',
            'bank_name.required' => '銀行名稱欄位不可為空',
            'bank_code.required' => '銀行代碼欄位不可為空',
            'bank_code.numeric' => '銀行代碼欄位格式不正確',
            'branch_name.required' => '分行名稱欄位不可為空',
            'branch_code.required' => '分行代碼欄位不可為空',
            'branch_code.numeric' => '分行代碼欄位格式不正確',
            'bank_account.required' => '銀行帳號欄位不可為空',
            'id_number.required' => '身分證字號欄位不可為空',
            'taxid.required' => '統一編號欄位不可為空',
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
