<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CategoryCollection;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{

    public function index()
    {
        return new CategoryCollection(Category::all());
    }


    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create($request->all());
        return $category;
    }


    public function show(Category $category)
    {
        $category = new CategoryResource($category);
        return $category;
    }


    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->all());
        return response()->json();
    }


    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json();
    }
}
