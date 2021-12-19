<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{
    Student,
    Lesson 
};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Student::factory(10)->create();
        Lesson::factory(10)->create();
        $this->call(UserSeeder::class);
    }
}
