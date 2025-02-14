@extends('students.master')

@section('content')

<div class="card">
    <div class="card-header">Edit Student Infomation</div>
    <div class="card-body">
        <form method="post" action="{{ route('students.update', $student->StudentID) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Student Name</label>
                <div class="col-sm-10">
                    <input type="text" name="StudentName" class="form-control" value="{{ $student->StudentName }}" />

                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Student Email</label>
                <div class="col-sm-10">
                    <input type="text" name="StudentEmail" class="form-control" value="{{ $student->StudentEmail }}" />

                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-2 col-label-form">Student Gender</label>
                <div class="col-sm-10">
                    <select name="StudentGender" class="form-control">
                        <option value="0">Nam</option>
                        <option value="1">Nữ</option>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="ClassRoomID" class="form-label">ClassRoom Name</label>
                <select id="ClassRoomID" class="form-select" name="ClassRoomID" required>
                    @foreach ($classrooms as $classroom )
                    <option value="{{ $classroom -> ClassRoomID }}" @if ($classroom->ClassRoomID == $student->ClassRoomID) selected @endif>
                        {{ $classroom->ClassRoomName }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="text-center">
                <input type="hidden" name="hidden_id" value="{{ $student->StudentID }}"/>
                <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
                <input type="submit" class="btn btn-primary" value="Edit"/>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementsByName('StudentGender')[0].value = "{{ $student->StudentGender }}";
</script>

@endsection