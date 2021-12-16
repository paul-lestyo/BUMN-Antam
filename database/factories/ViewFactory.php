<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ViewFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		return [
			'count' => rand(1, 100),
			'article_id' => Article::inRandomOrder()->first(),
			'date' => $this->faker->dateTimeBetween('-1 years', '-1 days')
		];
	}
}
