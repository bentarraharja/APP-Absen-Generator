<?php

namespace Database\Factories;

use App\Models\DataMahasiswa;
use Illuminate\Database\Eloquent\Factories\Factory;

class DataMahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = DataMahasiswa::class;
    public function definition()
    {
        return [
            'nama' => $this->faker->titleMale(),
            'alamat' => $this->faker->address(),
            'umur' => $this->faker->randomDigit(),
            'no_hp' => $this->faker->phoneNumber(),
        ];
    }
}
