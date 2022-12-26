<?php

use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoryIdToProductsTable extends Migration
{
    
    public function up()
    {
        $category = new Category();
        $category->name = 'Otros';
        $category->save();
        
        Schema::table('products', function (Blueprint $table) use ($category){
            $table->unsignedBigInteger('category_id')->default($category->id);

            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('category_id');
        });
    }
}
