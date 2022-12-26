<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory , HasApiTokens;

    protected $guarded = [];

    public function products(){
        return $this->hasMany(Product::class);
    }
}
