<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->factory(\App\Models\Product::class,10)->create();
        \App\Models\Product::factory(10)->create();
    }
}
