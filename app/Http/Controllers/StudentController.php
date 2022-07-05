<?php

namespace App\Http\Controllers;

use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('students.index', [
            'students' => Student::with('grades')->get()
        ]);
    }
}
