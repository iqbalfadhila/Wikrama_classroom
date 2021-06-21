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
      
            <form action="{{ route('admin.teacher.update',$teacher->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
           
                 <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>NIP</strong>
                            <input disabled type="text" name="nip" value="{{ old('nip') ?? $teacher->nip}}" class="form-control @error ('nip') is-invalid @enderror" id="name" placeholder="NIP">
                            @error('nip')
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
                            <select name="lesson_id" id="lesson_id" class="form-control @error('lesson_id') is-invalid @enderror">
                                <option value="">-----Lesson----</option>
                                @foreach($lesson as $lesson)
                                <option value="{{ $lesson->id }}" {{ $teacher->lesson_id == $lesson->id ? 'selected' : '' }}>{{ $lesson->lesson }}</option>
                                @endforeach
                            </select>
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
                            <select name="religion" id="religion" class="form-control @error('religion') is-invalid @enderror">
                                <option value="">-----Religion-----</option>
                                <option value="islam" {{$teacher->religion == "islam" ? "selected" : ""}}>Islam</option>
                                <option value="protestan" {{$teacher->religion == "protestan" ? "selected" : ""}}>Protestan</option>
                                <option value="katolik" {{$teacher->religion == "katolik" ? "selected" : ""}}>Katolik</option>
                                <option value="hindu" {{$teacher->religion == "hindu" ? "selected" : ""}}>Hindu</option>
                                <option value="buddha" {{$teacher->religion == "buddha" ? "selected" : ""}}>Buddha</option>
                                <option value="khonghucu" {{$teacher->religion == "khonghucu" ? "selected" : ""}}>Khonghucu</option>
                            </select>
                            @error('religion')
                                <span class="invalid-feedback">{{ $message }}</span>
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