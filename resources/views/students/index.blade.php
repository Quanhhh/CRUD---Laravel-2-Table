@extends('students.master')

@section('content')

@if ($message = Session::get('Success'))
<div class="alert alert-success">
    {{ $message }}
</div>
@endif

<div class="container mt-5">
    <h1 class="text-primary mt-3 mb-4 text-center"><b>Student Management</b></h1>
</div>

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col col-md-6"><b>Students List</b></div>
            <div class="col col-md-6">
                <a href="{{ route('students.create') }}" class="btn btn-success btn-sm float-end">Add Student</a> 
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Student Email</th>
                <th>Student Gender</th>
                <th>ClassRoom Name</th>
                <th>Activities</th>
            </tr>
            @if(count($students) > 0)
                @foreach($students as $row)
                    <tr>
                        <td>{{ $row->StudentID }}</td>
                        <td>{{ $row->StudentName }}</td>
                        <td>{{ $row->StudentEmail }}</td>
                        <td>@if ($row->StudentGender == 0) Nam @else Nữ @endif</td>
                        <td>{{ $row->Classroom->ClassRoomName ?? 'Không có lớp' }}</td>
                        <td>
                            <form method="post" action="{{ route('students.destroy', $row->StudentID) }}">
                                @csrf
                                @method('DELETE')

                                <a href="{{ route('students.show', $row->StudentID) }}" class="btn btn-primary">View</a>
                                <a href="{{ route('students.edit', $row->StudentID) }}" class="btn btn-warning">Edit</a>
                                <input type="submit" class="btn btn-danger btn-sm" value="Delete"/>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6" class="text-center">No Data Found</td>
                </tr>
            @endif
        </table>
        {!! $students->links() !!}
    </div>
</div>

@endsection
