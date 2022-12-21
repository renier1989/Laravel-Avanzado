<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryCollection extends ResourceCollection
{
    public $collects = CategoryResource::class;

    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'metadata' => 'aqui van las metadata de las categorias'
        ];
    }
}
