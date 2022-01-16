<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductOrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'quantity'=>rand(1,10),
            'user_id'=>2,
            'product_id'=>Product::all()->random()->id,
        ];
    }
}
