@extends('admin.template.dashboard')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <div>
                <h2>Teacher</h2>
            </div>
        </div>           
        <div class="card-body">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('admin.teacher.create') }}"> Create New Teacher</a>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
           
            <table class="table table-bordered" id="table">
                <thead class="thead-dark" align="center">
                    <tr>
                        <th>ID</th>
                        <th>NIP</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>lesson</th>
                        <th>Gender</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody align="center">
                    @foreach ($teachers as $teacher)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $teacher->nip }}</td>
                            <td>{{ $teacher->name }}</td>
                            <td>{{ $teacher->user['email'] }}</td>
                            <td>{{ $teacher->lesson['lesson'] }}</td>
                            <td>{{ $teacher->gender }}</td>
                            <td>
                                <form action="{{ route('admin.teacher.destroy', $teacher->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <a href="{{ route('admin.teacher.edit', $teacher->id) }}" class="btn btn-warning btn-sm "><i class="feather icon-edit"></i></a>          
                                <button type="submit" class="btn btn-danger btn-sm"><i class="feather icon-trash"></i></button> 
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    {!! $teachers->links() !!}
        </div>
    </div>
</div>
@endsection