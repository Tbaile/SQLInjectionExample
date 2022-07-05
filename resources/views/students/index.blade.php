@extends('base')

@section('content')
    <div class="card">
        <div class="card-header">
            Grade List
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Student</th>
                        <th>Grade</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td>{{ $student->surname . ' ' . $student->name }}</td>
                            <td>{{ number_format($student->grades()->avg('grade'), 2) }}</td>
                            <td><a href="{{ route('student.grade.create', $student) }}">New Grade</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
