<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGrade;
use App\Models\Grade;
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
        $grade = new Grade();
        $grade->student()->associate($student);
        $grade->fill($request->all());
        $grade->save();
        session()->flash('return', 1);
        return redirect()->route('student.index');
    }
}
