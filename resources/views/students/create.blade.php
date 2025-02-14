@extends('students.master')
@section('content')

@if ($errors->any())

<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all as $error )
        <li>{{ $error }}</li>
        
        @endforeach
    </ul>
</div>

@endif

<div class="card">
    <div class="card-header">Add New Student</div>
    <div class="card-body">
        <form method="post" action="{{ route('students.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Student Name</label>
                <div class="col-sm-10">
                    <input type="text" name="StudentName" class="form-control"/>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Student Email</label>
                <div class="col-sm-10">
                    <input type="text" name="StudentEmail" class="form-control" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Student Gender</label>
                <div class="col-sm-10">
                <select name="StudentGender" class="form-control">
                    <option value="0">Nam</option>
                    <option value="1">Nữ</option>
                </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="ClassRoomID" class="form-label">Select ClassRoomName</label>
                <select id="ClassRoomID" class="form-select" name="ClassRoomID" required>
                    @foreach ($classrooms as $classroom )
                    <option value="{{ $classroom->ClassRoomID }}">{{ $classroom->ClassRoomName }}</option>
                    
                    @endforeach
                </select>
            </div>
                    <div class="text-center">
                        <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
                        <input type="submit" class="btn btn-primary" value="Add"/>
                    </div>
        </form>
    </div>
</div>
@endsection
