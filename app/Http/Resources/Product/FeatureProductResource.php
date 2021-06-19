<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class FeatureProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            
            'id'=>$this->id,
            'product_code'=>$this->product_code,
            'name'=>$this->name,
            'category_slug'=>$this->category_slug,
            'subcategory_slug'=>$this->subcategory_slug,
            'product_slug'=>$this->product_slug,
            'price'=>$this->price,
            'desc'=>$this->desc,
            'cloth_name'=>$this->cloth_name,
            'image'=>$this->image,
            'status'=>$this->status,
            'href'=>[
                
                'link'=>route('product_detail',$this->id)
                
                ]
            
            ];
    }
}
