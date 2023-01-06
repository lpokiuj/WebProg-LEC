<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $faker = Faker::create();
        $teacher = User::create([
            'name' => 'Teacher',
            'email' => 'teacher@gmail.com',
            'password' => bcrypt('12345678'),
            'isTeacher' => true
        ]);

        $student = User::create([
            'name' => 'Student',
            'email' => 'student@gmail.com',
            'password' => bcrypt('12345678'),
            'isTeacher' => false
        ]);

        // foreach (range(1, 5) as $index) {
        //     $teacher->courses()->create([
        //         'name' => $faker->name,
        //         'description' => $faker->text,
        //     ]);
        // }
    }
}
