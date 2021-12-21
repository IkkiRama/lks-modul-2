<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AttendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'user_id'=> mt_rand(2,4),
            'subject_id'=> mt_rand(1,10),
            'classe_id'=> mt_rand(1,4),
            'date'=> $this->faker->date(now()),
            'topic' => $this->faker->randomElement(['Belajar tag a,h, p, link', 'Belajar color, backgorund-color, text-shadow', 'Belajar Asycn JavaScript']),
        ];

        // php artisan make:model User -mfs
        // php artisan migrate:fresh --seed
        // php artisan db:seed
    }
}
