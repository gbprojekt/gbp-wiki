<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return[
            'title' => $this->faker->sentence(5),
            'content' => $this->faker->sentence(20),
            'active' => $this->faker->boolean(),
            'category_id' => $this->faker->numberBetween(1,3)
        ];
    }
}
