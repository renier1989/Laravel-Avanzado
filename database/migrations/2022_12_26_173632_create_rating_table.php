<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->float('score');

            $table->morphs('rateable');
            /** son el equibalente a tener estos campos  en la tabla */
            // $table->unsignedBiginteger('rateable_id');
            // $table->string('rateable_type');

            $table->morphs('qualifier');
            /** son el equvalente a tener estos campos en la tabla */
            // $table->integer('qualifier_id');
            // $table->string('qualifier_type');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rating');
    }
}
