<?php

namespace Database\Seeders;

use App\Models\Divisi;
use Illuminate\Database\Seeder;

class DivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Divisi::insert(
            [
                [
                    'nama_divisi' => 'Keuangan',
                    'created_at'=>now()
                ],
                [
                    'nama_divisi' => 'IT',
                    'created_at'=>now()
                ],
                [
                    'nama_divisi' => 'Marketing',
                    'created_at'=>now()
                ]
            ]
        );
    }
}
