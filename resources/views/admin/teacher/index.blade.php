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
                <a class="btn btn-success" href="{{ route('admin.exportteacher') }}"> Export</a>
                <button type="button" class="btn  btn-primary" data-toggle="modal" data-target="#exampleModalPopovers">Launch demo modal</button>
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
    <!-- [ tooltip-modal ] start -->
    <div id="exampleModalPopovers" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalPopoversLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalPopoversLabel">Modal Title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="#" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="file" name="file" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn  btn-primary">Import</button>
                </div>
            </div>
        </div>
    </div>
	<!-- [ tooltip-modal ] end -->
</div>
@endsection