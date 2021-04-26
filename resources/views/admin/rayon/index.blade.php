@extends('admin.template.dashboard')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <div>
                <h2>Rayon</h2>
            </div>
        </div>           
        <div class="card-body">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('admin.rayon.create') }}"> Create New Rayon</a>
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
                        <th>Rayon</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody align="center">
                    @foreach ($rayons as $rayon)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $rayon->rayon }}</td>
                            <td>
                                <form action="{{ route('admin.rayon.destroy', $rayon->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <a href="{{ route('admin.rayon.edit', $rayon->id) }}" class="btn btn-warning btn-sm "><i class="feather icon-edit"></i></a>          
                                <button type="submit" class="btn btn-danger btn-sm"><i class="feather icon-trash"></i></button> 
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    {!! $rayons->links() !!}
        </div>
    </div>
</div>
@endsection