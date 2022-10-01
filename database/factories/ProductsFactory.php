<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Products;

class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Products::class;


    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'slug' => $this->faker->word(),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomDigit()
        ];
    }
}
