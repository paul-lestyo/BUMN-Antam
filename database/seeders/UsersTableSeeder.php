<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Pegawai;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{


		\DB::table('users')->delete();

		\DB::table('users')->insert(array(
			0 =>
			array(
				'username' => 'pegawai',
				'email' => 'pegawai@gmail.com',
				'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
				'role_id' => 1,
				'created_at' => NULL,
				'updated_at' => NULL,
			),
			1 =>
			array(
				'username' => 'admin',
				'email' => 'admin@gmail.com',
				'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
				'role_id' => 2,
				'created_at' => NULL,
				'updated_at' => NULL,
			),
		));

		Pegawai::factory()->create(['user_id' => 1]);
		Pegawai::factory()->create(['user_id' => 2]);
		User::factory(15)->has(Pegawai::factory())->create(['role_id' => '1']);
		User::factory(5)->create(['role_id' => '2']);
	}
}
