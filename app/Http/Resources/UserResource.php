<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'type' => $this->type,
            'account' => $this->account,
            'email' => $this->email,
            'id_number' => $this->id_number,
            'taxid' => $this->taxid,
            'phone' => $this->phone,
            'status' => $this->status,
            'gender' => $this->gender,
            'birth' => date("Y-m-d", strtotime($this->birth)),
            'country' => $this->country,
            'zipcode' => $this->zipcode,
            'county' => $this->county,
            'district' => $this->district,
            'address' => $this->address,
            'bank_user_name' => $this->bank_user_name,
            'bank_name' => $this->bank_name,
            'bank_code' => $this->bank_code,
            'branch_name' => $this->branch_name,
            'branch_code' => $this->branch_code,
            'bank_account' => $this->bank_account,
            'created_at' => date("Y-m-d H:i:s", strtotime($this->created_at)),
            'updated_at' => date("Y-m-d H:i:s", strtotime($this->updated_at))
        ];
    }
}
