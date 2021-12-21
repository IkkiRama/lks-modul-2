<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classes')->insert([
            'name' => "XII RPL 1",
            'created_at'=> now(),
            'updated_at'=> now()
        ]);

        DB::table('classes')->insert([
            'name' => "XII RPL 2",
            'created_at'=> now(),
            'updated_at'=> now()
        ]);

        DB::table('classes')->insert([
            'name' => "XII RPL 3",
            'created_at'=> now(),
            'updated_at'=> now()
        ]);

        DB::table('classes')->insert([
            'name' => "XII RPL 4",
            'created_at'=> now(),
            'updated_at'=> now()
        ]);
    }
}
