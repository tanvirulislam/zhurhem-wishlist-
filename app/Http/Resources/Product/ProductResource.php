<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'category_name'=>$this->cat_id,
            'cat_slug'=>$this->cat_slug,
            'item_name'=>$this->item_name,
            'item_image'=>$this->item_image,
            'item_quantity'=>$this->item_quantity,
            'item_des'=>$this->item_des,
            'item_price'=>$this->item_price,
            'item_offerprice'=>$this->item_offerprice,
            'item_weight'=>$this->weight,
            'item_status'=>$this->status,
            'href'=>[
                
                'link'=>route('product_detail',$this->id)
                
                ]
            
            ];
    }
}
