<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Classe;
use App\Models\Subject;
use App\Models\Attdetail;
use App\Models\Attendance;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\KelasSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *clear
     * @return void
     */
    public function run()
    {
        // $this->call([
        //     UserSeeder::class,
        //     KelasSeeder::class,
        // ]);

        User::factory(10)->create();
        Subject::factory(10)->create();
        Attendance::factory(10)->create();
        Attdetail::factory(10)->create();
    }
}
