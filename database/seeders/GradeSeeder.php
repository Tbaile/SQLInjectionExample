<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Grade;
use App\Models\Student;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        foreach (Student::cursor() as $student) {
            foreach (Course::cursor() as $course) {
                $grade = new Grade();
                $grade->student()->associate($student);
                $grade->course()->associate($course);
                $grade->grade = 3.5;
                $grade->save();
            }
        }
    }
}
