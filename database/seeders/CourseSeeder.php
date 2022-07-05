<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Course::create([
            'name' => 'Informatica'
        ]);
        Course::create([
            'name' => 'Sistemi'
        ]);
        Course::create([
            'name' => 'Telecomunicazioni'
        ]);
    }
}
