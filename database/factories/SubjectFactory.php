<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                'name'=> $this->faker->randomElement(["Belajar HTML Dasar", "Belajar CSS Dasar", "Belajar JavaScript Dasar"]),
        ];
    }
}
