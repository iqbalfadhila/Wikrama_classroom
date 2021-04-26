@extends('admin.template.dashboard')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <div>
                <h2>Lesson</h2>
            </div>
        </div>           
        <div class="card-body">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('admin.lesson.create') }}"> Create New Lesson</a>
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
                        <th>Lesson</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody align="center">
                    @foreach ($lessons as $lesson)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $lesson->lesson }}</td>
                            <td>
                                <form action="{{ route('admin.lesson.destroy', $lesson->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <a href="{{ route('admin.lesson.edit', $lesson->id) }}" class="btn btn-success btn-sm "><i class="feather icon-edit"></i></a>          
                                <button type="submit" class="btn btn-danger btn-sm"><i class="feather icon-trash"></i></button> 
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    {!! $lessons->links() !!}
        </div>
    </div>
</div>
@endsection