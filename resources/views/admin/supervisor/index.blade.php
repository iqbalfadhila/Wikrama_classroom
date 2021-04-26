@extends('admin.template.dashboard')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <div>
                <h2>Supervisor</h2>
            </div>
        </div>           
        <div class="card-body">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('admin.supervisor.create') }}"> Create New Supervisor</a>
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
                        <th>Supervisor</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody align="center">
                    @foreach ($supervisors as $supervisor)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $supervisor->name }}</td>
                            <td>
                                <form action="{{ route('admin.supervisor.destroy', $supervisor->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <a href="{{ route('admin.supervisor.edit', $supervisor->id) }}" class="btn btn-success btn-sm "><i class="feather icon-edit"></i></a>          
                                <button type="submit" class="btn btn-danger btn-sm"><i class="feather icon-trash"></i></button> 
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    {!! $supervisors->links() !!}
        </div>
    </div>
</div>
@endsection