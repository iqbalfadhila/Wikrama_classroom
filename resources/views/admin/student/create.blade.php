@extends('admin.template.dashboard')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Add New Student</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admin.student.index') }}"> Back</a>
            </div>
                
               
            <form action="{{ route('admin.student.store') }}" method="POST">
                @csrf
              
                 <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>NIS:</strong>
                            <input type="text" name="nis" class="form-control @error('nis') is-invalid @enderror" value="{{ old('nis') }}" placeholder="NIS">
                            @error('nis')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" id="name" value="{{ old('name') }}">
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Email:</strong>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" id="email"  placeholder="Email">
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Password:</strong>
                            <input type="password" name="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                            @error('password')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Password comfirm:</strong>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Password">
                            @error('password')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Rombel:</strong>
                            <select name="rombel_id" id="rombel_id" class="form-control @error('rombel_id') is-invalid @enderror">
                                <option>-----Rombel-----</option>
                                @foreach($rombel as $rombel)
                                    <option value="{{ $rombel->id }}" {{$rombel->id == old('rombel_id') ? "selected" : ""}}>{{ $rombel->rombel }}</option>
                                @endforeach
                            </select>
                            @error('rombel_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Majors:</strong>
                            <select name="majors_id" id="majors_id" class="form-control @error('rombel_id') is-invalid @enderror">
                                <option>-----Majors-----</option>
                                @foreach($major as $major)
                                    <option value="{{ $major->id }}" {{$major->id == old('majors_id') ? "selected" : ""}}>{{ $major->majors }}</option>
                                @endforeach
                            </select>
                            @error('majors_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Rayon:</strong>
                            <select name="rayon_id" class="form-control">
                                <option value="">-----Rayon-----</option>
                                @foreach($rayon as $rayon)
                                    <option value="{{ $rayon->id }}" {{$rayon->id == old('rayon_id') ? "selected" : ""}}>{{ $rayon->rayon }}</option>
                                @endforeach
                            </select>
                            @error('rayon_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Grade:</strong>
                            <select name="grade" id="grade" class="form-control @error('grade') is-invalid @enderror">
                                <option value="">-----Grade-----</option>
                                    <option value="10" {{"10" == old('grade') ? "selected" : ""}}>10</option>
                                    <option value="11" {{"11" == old('grade') ? "selected" : ""}}>11</option>
                                    <option value="12" {{"11" == old('grade') ? "selected" : ""}}>12</option>
                            </select>
                            @error('grade')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Religion:</strong>
                            <select name="religion" id="religion" class="form-control @error('religion') is-invalid @enderror">
                                <option>-----Religion-----</option>
                                <option value="islam" {{"islam" == old('religion') ? "selected" : ""}}>Islam</option>
                                <option value="protestan" {{"protestan" == old('religion') ? "selected" : ""}}>Protestan</option>
                                <option value="katolik" {{"katolik" == old('religion') ? "selected" : ""}}>Katolik</option>
                                <option value="hindu"{{"hindu" == old('religion') ? "selected" : ""}}>Hindu</option>
                                <option value="buddha" {{"buddha" == old('religion') ? "selected" : ""}}>Buddha</option>
                                <option value="khonghucu" {{"khonghucu" == old('religion') ? "selected" : ""}}>Khonghucu</option>
                            </select>
                            @error('religion')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Gender:</strong>
                            <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror">
                                <option value="">-----gender-----</option>
                                    <option value="L" {{"L" == old('gender') ? "selected" : ""}}>Laki-Laki</option>
                                    <option value="P" {{"P" == old('gender') ? "selected" : ""}}>Perempuan</option>
                            </select>
                            @error('gender')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Photo:</strong>
                            <input type="file" name="photo" id="photo" class="form-control @error('photo') is-invalid @enderror" aria-describedby="photoHelp">
                                <div id="photoHelp" class="form-text">Tidak perlu diisi bila tidak ingin mengganti foto.</div>
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