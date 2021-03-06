<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(AnggotaTableSeeder::class); //tambahkan satu line
        $this->call(BukuTableSeeder::class); //tambahkan satu line
        $this->call(PetugasTableSeeder::class); //tambahkan satu line
    }
}
