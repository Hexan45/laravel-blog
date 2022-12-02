<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Articles>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->realText(maxNbChars: 30),
            'description' => $this->faker->realText(maxNbChars: 400),
            'excerpt' => $this->faker->realText(maxNbChars: 60),
            'author_id' => $this->faker->randomDigit(),
            'category_id' => $this->faker->randomDigit(),
            'article_created_at' => date('Y-m-d H:i:s')
        ];
    }
}
