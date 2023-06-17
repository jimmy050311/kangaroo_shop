<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdminResource extends JsonResource
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
            'account' => $this->account,
            'phone' => $this->phone,
            'email' => $this->email,
            'verify_id' => $this->verify_id,
            'status' => $this->status,
            'created_at' => date("Y-m-d H:i:s", strtotime($this->created_at)),
            'updated_at' => date("Y-m-d H:i:s", strtotime($this->updated_at))
        ];
    }
}
