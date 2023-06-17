<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'number' => $this->number,
            'image' => $this->image,
            'category_id' => $this->category_id,
            'category_name' => $this->category->name,
            'rate' => $this->rate,
            'profit' => $this->profit,
            'amount' => $this->amount,
            'origin_price_aud' => (int)$this->origin_price_aud,
            'real_price_aud' => (int)$this->real_price_aud,
            'origin_price_twd' => (int)$this->origin_price_twd,
            'real_price_twd' => (int)$this->real_price_twd,
            'spec' => $this->spec,
            'description' => $this->description,
            'introduction' => $this->introduction,
            'status' => $this->status,
            'img_data' => ProductImageResource::collection($this->productImage),
            'created_at' => date("Y-m-d H:i:s", strtotime($this->created_at)),
            'updated_at' => date("Y-m-d H:i:s", strtotime($this->updated_at))
        ];
    }
}
