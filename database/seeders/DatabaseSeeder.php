<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Contact;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->call(DivisiSeeder::class);
		$this->call(RolesTableSeeder::class);
		$this->call(UsersTableSeeder::class);

		Article::factory()->count(10)->create();

		About::factory()->create();

		Contact::factory()->create();
		$this->call(ArticlesTableSeeder::class);
		$this->call(ViewTableSeeder::class);
	}
}
