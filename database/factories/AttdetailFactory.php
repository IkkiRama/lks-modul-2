<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AttdetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'attendance_id'=>mt_rand(1,10),
            'user_id'=> mt_rand(5,14),
            'attstatus'=> $this->faker->randomElement(['Hadir', 'Sakit', 'Izin','Tanpa Keterangan'])
        ];
    }
}
