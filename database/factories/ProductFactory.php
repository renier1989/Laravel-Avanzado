<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        User::factory(10)->create();

        return [
            'name' => $this->faker->name(),
            'price' => $this->faker->numberBetween(10000, 60000),
            'category_id' => function (){
                return Category::query()->inRandomOrder()->first()->id;
            },
            'created_by' => function (){
                return User::query()->inRandomOrder()->first()->id;
            }
        ];
    }
}
