<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    
    public function toArray($request)
    {

        return [
            'id' => (int) $this->id,
            'nomnbre' => (string) $this->name,
            'precio' => (float) $this->price
        ];

        // return parent::toArray($request);
    }
}
