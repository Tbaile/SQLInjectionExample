<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGrade;
use App\Models\Student;
use PDO;

class GradeController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Student $student)
    {
        return view('grades.create', [
            'student' => $student
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGrade  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreGrade $request, Student $student)
    {
        // INSECURE CODE HERE!
        $servername = config('database.connections.mysql.host');
        $dbname = config('database.connections.mysql.database');
        $username = config('database.connections.mysql.username');
        $password = config('database.connections.mysql.password');
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $sql = "INSERT INTO grades (student_id, course_id, grade, created_at, updated_at) VALUES ($student->id, $request->course_id, 3.5, NOW(), NOW())";
        // use exec() because no results are returned
        $conn->exec($sql);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return redirect()->route('student.index');
    }
}
