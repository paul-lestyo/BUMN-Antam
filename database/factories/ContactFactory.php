<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
	private static $number = 1;
	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		return [
			'deskripsi' => "
			<ul>
				<li>
					Gedung Aneka Tambang Tower A<br/>Jl. Letjen. T.B. Simatupang No. 1<br/>Lingkar Selatan, Tanjung Barat<br/>Jakarta 12530, Indonesia
				</li>

				<li>
					(62-21) 789 1234
				</li>
				<li>
					(62-21) 789 1224
				</li>
				<li>
					corsec@antam.com
				</li>
			</ul>
			",
			'iframe' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d253223.49588943887!2d112.72495040990283!3d-7.396726597825738!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7f93e8f141bd1%3A0x7946135b52d2bdf3!2sPT.%20Antam!5e0!3m2!1sen!2sid!4v1639141965429!5m2!1sen!2sid" width="300px" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
		];
	}
}
