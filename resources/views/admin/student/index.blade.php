@extends('admin.template.dashboard')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div>
                <h4>Student</h4>
            </div>
            <div class="card-header-right">
                <div class="btn-group card-option">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="feather icon-more-horizontal"></i>
                    </button>
                    <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                        <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                    </ul>
                </div>
            </div>
        </div>           
        <div class="card-body">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('admin.student.create') }}">Create New Student</a>
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
                        <th>NIS</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Rombel</th>
                        <th>Rayon</th>
                        <th>Gender</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody align="center">
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $student->nis }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->user['email'] }}</td>
                            <td>{{ $student->rombel['rombel'] }}</td>
                            <td>{{ $student->rayon['rayon'] }}</td>
                            <td>{{ $student->gender }}</td>
                            <td>
                                <form action="{{ route('admin.student.destroy', $student->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <a href="{{ route('admin.student.edit', $student->id) }}" class="btn btn-warning btn-sm "><i class="feather icon-edit"></i></a>          
                                <button type="submit" class="btn btn-danger btn-sm"><i class="feather icon-trash"></i></button> 
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    {!! $students->links() !!}
        </div>
    </div>
</div>
@endsection