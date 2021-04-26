@extends('admin.template.dashboard')
@section('content')

<div class="container">
    {{-- <div class="row"> --}}
        {{-- <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <h2>Add New Rombel</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('admin.rombel.index') }}"> Back</a>
                    </div>
                        
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    
                    <form action="{{ route('admin.rombel.store') }}" method="POST">
                        @csrf
                    
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Rombel:</strong>
                                    <input type="text" name="rombel" class="form-control" placeholder="Rombel" value="{{ old("rombel") }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}
        
        {{-- <div class="col-sm-8"> --}}
            <div class="card">
                <div class="card-header">
                    <div>
                        <h2>Rombel</h2>
                    </div>
                </div>           
                <div class="card-body">
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('admin.rombel.create') }}"> Create New Rombel</a>
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
                                <th>Rombel</th>
                                <th>Majors_id</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody align="center">
                            @foreach ($rombels as $rombel)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $rombel->rombel }}</td>
                                    <td>{{ $rombel->majors['majors'] }}</td>
                                    <td>
                                        <form action="{{ route('admin.rombel.destroy', $rombel->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('admin.rombel.edit', $rombel->id) }}" class="btn btn-warning btn-sm "><i class="feather icon-edit"></i></a>          
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="feather icon-trash"></i></button> 
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            {!! $rombels->links() !!}
                </div>
            </div>
        {{-- </div> --}}
    {{-- </div> --}}
</div>
@endsection