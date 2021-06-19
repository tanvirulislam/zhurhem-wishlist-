<?php

namespace App\Http\Resources\Category;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'slug'=>$this->category_slug,
            'href' => [
                'product_link' => route('catpro',$this->category_slug)
            ]
            
            ];
    }
}
