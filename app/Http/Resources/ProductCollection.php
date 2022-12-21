<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{

    public $collects = ProductResource::class;

    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'metadata' => 'aqui va la meta data'
        ];
    }
}
