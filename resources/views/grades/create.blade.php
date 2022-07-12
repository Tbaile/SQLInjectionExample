@extends('base')

@section('content')
<div class="card">
    <div class="card-header">
        Create Grade for {{ $student->surname . ' ' . $student->name }}
    </div>
    <div class="card-body">
        <form action="{{ route('student.grade.store', $student) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-sm-6 mb-2">
                    <label for="grade" class="form-label">Grade</label>
                    <input type="number" name="grade" class="form-control @error('grade') is-invalid @enderror" id="grade" min="0" max="10" step="0.25" value="3.5">
                    @error('grade')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-sm-6 mb-2">
                    <label for="course_id" class="form-label">Course</label>
                    <select id="course_id" name="course_id" class="form-select">
                        @foreach(\App\Models\Course::all() as $course)
                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection
