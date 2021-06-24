@extends('student.template.dashboard')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <div>
                <h2>Task Done</h2>
            </div>
        </div>           
        <div class="card-body">
            <div class="pull-right">
                {{-- <a class="btn btn-success" href="{{ route('student.task.create') }}"> Create New Task</a> --}}
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
                        <th>Lesson</th>
                        <th>Upload Date</th>
                        <th>Teacher</th>
                        <th>File Upload</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody align="center">
                    @forelse ($collect as $col)
                        <tr>
                            <td></td>
                            <td>{{ $col->task->title }}</td>
                            <td>{{ $col->task->lesson->lesson }}</td>
                            <td>{{ date('D, d-m-Y', strtotime($col->task->upload)) }}</td>
                            <td>{{ $col->task->teacher->name }}</td>
                            <td>{{ $col->upload }}</td>
                            <td></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" align="center">Data kosong.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {!! $collect->links() !!}
        </div>
    </div>
</div>
@endsection