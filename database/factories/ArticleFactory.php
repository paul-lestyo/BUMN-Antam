<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'judul'=>$this->faker->sentence(6, true),
            'deskripsi'=>$this->faker->paragraph(100),
            'author'=>$this->faker->name(),
            'category'=>$this->faker->word()
        ];
    }
}
