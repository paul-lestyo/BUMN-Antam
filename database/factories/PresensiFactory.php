<?php

namespace Database\Factories;

use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Factories\Factory;

class PresensiFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		return [
			'pegawai_id' => Pegawai::inRandomOrder()->first(),
			'jurnal' => $this->faker->sentence(6, true),
			'created_at' => $this->faker->dateTimeBetween('-2 years', '0 days')
		];
	}
}
