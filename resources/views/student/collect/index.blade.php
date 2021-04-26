@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <div>
                <h2>Collect</h2>
            </div>
        </div>           
        <div class="card-body">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('collect.create') }}"> Create New Collect</a>
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
                        <th>Title</th>
                        <th>Teacher_id</th>
                        <th>Deadline</th>
                        <th>created_by</th>
                        <th>Description</th>
                        <th>File</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody align="center">
                    @foreach ($collects as $collect)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $collect->task['title'] }}</td>
                            <td>{{ $collect->teacher['name'] }}</td>
                            <td>{{ $collect->deadline }}</td>
                            <td>{{ $collect->created_by }}</td>
                            <td>{{ $collect->description }}</td>
                            <td>{{ $collect->file }}</td>
                            <td>
                                <form action="{{ route('collect.destroy', $collect->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <a href="{{ route('collect.edit', $collect->id) }}" class="btn btn-success btn-sm "><i class="fa fa-pen"></i></a>          
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button> 
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    {!! $collects->links() !!}
        </div>
    </div>
</div>
@endsection