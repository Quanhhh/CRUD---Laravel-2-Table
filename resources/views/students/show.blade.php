@extends('students.master')

@section('content')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col col-md-6"><b>Student Infomation</b></div>
            <div class="col col-md-6">
                <a href="{{ route('students.index') }}" class="btn btn-primary btn-sm float-end">View All Lists</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>Student Name</b></label>
            <div class="col-sm-10">
                {{ $student->StudentName }}
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>Student Email</b></label>
            <div class="col-sm-10">
                {{ $student->StudentEmail }}
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>Student Gender</b></label>
            <div class="col-sm-10">
                @if ($student->StudentGender == 0)
                    Nam
                    @else 
                    Nữ
                    @endif
            </div>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
        </div>

    </div>

</div>

@endsection('content')