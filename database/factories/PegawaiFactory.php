<?php

namespace Database\Factories;

use App\Models\Divisi;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PegawaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        return [
            'nip' => $this->faker->creditCardNumber(),
            'nama_pegawai' => $this->faker->name(),
            'alamat_pegawai' => $this->faker->address(),
            'no_telp' => $this->faker->phoneNumber(),
            'golongan' => '1a',
            'user_id' => User::factory()->create()->id,
            'divisi_id' => Divisi::inRandomOrder()->first()
        ];
    }
}
