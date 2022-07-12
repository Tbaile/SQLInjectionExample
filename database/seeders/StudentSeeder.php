<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    protected array $students = [
        [
            'name' => 'Luca',
            'surname' => 'Avaltroni'
        ],
        [
            'name' => 'Tommaso',
            'surname' => 'Bucci'
        ],
        [
            'name' => 'Cordova Villanueva',
            'surname' => 'Jason Gabriel'
        ],
        [
            'name' => 'Simone',
            'surname' => 'Iannone'
        ],
        [
            'name' => 'Gianluca',
            'surname' => 'Iodice'
        ],
        [
            'name' => 'Tommaso',
            'surname' => 'Isotti'
        ],
        [
            'name' => 'Nicola',
            'surname' => 'Maggiori'
        ],
        [
            'name' => 'Marco',
            'surname' => 'Mattioli'
        ],
        [
            'name' => 'Emanuele',
            'surname' => 'Napoli'
        ],
        [
            'name' => 'Enea',
            'surname' => 'Prifti'
        ],
        [
            'name' => 'Andrea',
            'surname' => 'Serafini'
        ],
        [
            'name' => 'Samuel',
            'surname' => 'Suffer'
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        foreach ($this->students as $student) {
            Student::create([
                'name' => $student['name'],
                'surname' => $student['surname']
            ]);
        }
    }
}
