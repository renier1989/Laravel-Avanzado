<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory , HasApiTokens;
    
    protected $guarded = [];

    public function category(){
        return $this->belongsTo(category::class);
    }

    public function createdBy(){
        return $this->belongsTo(User::class);
    }
}
