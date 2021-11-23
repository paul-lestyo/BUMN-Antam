<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Pegawai;
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

        User::factory(15)->has(Pegawai::factory())->create(['role_id'=>'1']);
        User::factory(5)->create(['role_id'=>'2']);

        Article::factory()->count(10)->create();

        About::factory()->create();

        Contact::factory()->count(9)->create();
    }
}
