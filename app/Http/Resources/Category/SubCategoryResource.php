<?php

namespace App\Http\Resources\Category;

use Illuminate\Http\Resources\Json\JsonResource;

class SubCategoryResource extends JsonResource
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
            'name'=>$this->name,
            'cat_slug'=>$this->category_slug,
            'sub_cat_slug'=>$this->subcategory_slug,
            'href' => [
                'product_link' => route('catprosub',$this->subcategory_slug)
            ]
            
            ];
    }
}