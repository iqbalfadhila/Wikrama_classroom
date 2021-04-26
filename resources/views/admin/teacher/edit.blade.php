@extends('admin.template.dashboard')
@section('content')
<div class="container">
    <div class="card">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="card-header">
                    <div class="pull-left">
                        <h2>Edit teacher</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="pull-right">
                <a class="btn btn-secondary" href="{{ route('admin.teacher.index') }}"> Back</a>
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
      
            <form action="{{ route('admin.teacher.update',$teacher->id) }}" method="POST">
                @csrf
                @method('PUT')
           
                 <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>rayon</strong>
                            <input type="number" name="rayon" value="{{ old('rayon') ?? $teacher->rayon}}" class="form-control @error ('rayon') is-invalid @enderror" id="name" placeholder="rayon">
                            @error('rayon')
                                <div class="invalid-feedback">
                                    {{ $message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name</strong>
                            <input type="text" name="name" value="{{ old('name') ?? $teacher->name}}" class="form-control @error ('name') is-invalid @enderror" id="name" placeholder="name">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Email</strong>
                            <input type="text" name="email" value="{{ old('email') ?? $teacher->email}}" class="form-control @error ('email') is-invalid @enderror" id="name" placeholder="email">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Password</strong>
                            <input type="text" name="password" value="{{ old('password') ?? $teacher->password}}" class="form-control @error ('password') is-invalid @enderror" id="name" placeholder="password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Lesson</strong>
                            <input type="text" name="lesson" value="{{ old('lesson') ?? $teacher->lesson}}" class="form-control @error ('lesson') is-invalid @enderror" id="name" placeholder="lesson">
                            @error('lesson')
                                <div class="invalid-feedback">
                                    {{ $message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Religion</strong>
                            <input type="text" name="religion" value="{{ old('religion') ?? $teacher->religion}}" class="form-control @error ('religion') is-invalid @enderror" id="name" placeholder="religion">
                            @error('religion')
                                <div class="invalid-feedback">
                                    {{ $message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Gender</strong>
                            <input type="text" name="gender" value="{{ old('gender') ?? $teacher->gender}}" class="form-control @error ('gender') is-invalid @enderror" id="name" placeholder="gender">
                            @error('gender')
                                <div class="invalid-feedback">
                                    {{ $message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Photo</strong>
                            <input type="file" name="photo" value="{{ old('photo') ?? $teacher->photo}}" class="form-control @error ('photo') is-invalid @enderror" id="name" placeholder="photo">
                            @error('photo')
                                <div class="invalid-feedback">
                                    {{ $message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection