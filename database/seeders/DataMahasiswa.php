<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DataMahasiswa as ModelDataMhs;
use Iluminate\Support\Str;

class DataMahasiswa extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelDataMhs::factory()->count(10)->create();
    }
}
