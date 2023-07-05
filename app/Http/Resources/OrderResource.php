<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'number' => $this->number,
            'user_id' => $this->user_id,
            'user_name' => $this->user->name,
            'county' => $this->county,
            'district' => $this->district,
            'zipcode' => $this->zipcode,
            'address' => $this->address,
            'bank_user_name' => $this->user->bank_user_name,
            'bank_name' => $this->user->bank_name,
            'bank_code'=> $this->user->bank_code,
            'branch_name' => $this->user->branch_name,
            'branch_code' => $this->user->branch_code,
            'bank_account' => $this->user->bank_account,
            'price' => (int)$this->price,
            'discount' => (int)$this->discount,
            'ship' => (int)$this->ship,
            'total_price' => (int)$this->total_price,
            'total_amount' => (int)$this->total_amount,
            'status' => $this->status,
            'ship_status' => $this->ship_status,
            'remark' => $this->remark,
            'created_at' => date("Y-m-d H:i:s", strtotime($this->created_at)),
            'paid_at' => date("Y-m-d H:i:s", strtotime($this->paid_at)),
            'refund_at' => date("Y-m-d H:i:s", strtotime($this->refund_at)),
            'product_data' => $this->orderDetail
        ];
    }
}
