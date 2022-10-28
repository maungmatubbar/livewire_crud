<div>
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                       <div class="d-flex justify-content-between">
                            <h4 class="card-title">Student List</h4>
                            <a href="{{ route('student.add') }}" class="btn btn-success">Add Student</a>
                       </div>
                        @if (Session::has('message'))
                            <div class="alert alert-success alert-dismissible">{{ Session::get('message') }}</div>
                        @endif
                    </div>
                    <div class="card-body">
                        <table class="table table-borderd">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($students->count() > 0)
                                    @foreach ($students as $student)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->email }}</td>
                                            <td>{{ $student->Phone }}</td>
                                            <td>
                                                <span class="btn-group">
                                                    <a href="{{ route('student.edit',['id'=>$student->id]) }}" class="btn btn-info">Edit</a>
                                                    <a href="javascript:void(0)" wire:click='delete({{ $student->id }})' class="btn btn-danger">Delete</a>
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                <tr>
                                    <td>No students found!</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
