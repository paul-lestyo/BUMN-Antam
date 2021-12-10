<?php

namespace Database\Factories;

use Illuminate\Support\Str;
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
		$title = $this->faker->sentence(6, true);
		return [
			'judul' => $title,
			'deskripsi' => $this->faker->paragraph(100),
			'author' => $this->faker->name(),
			'category' => $this->faker->word(),
			'slug' => Str::slug($title)
		];
	}
}
