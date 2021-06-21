@extends('admin.template.dashboard')
@section('content')
<div class="container">
    <div class="card">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="card-header">
                    <div class="pull-left">
                        <h2>Edit student</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="pull-right">
                <a class="btn btn-secondary" href="{{ route('admin.student.index') }}"> Back</a>
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
      
            <form action="{{ route('admin.student.update',$student->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
           
                 <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>NIS</strong>
                            <input disabled type="text" name="nis" id="nis" value="{{ old('nis') ?? $student->nis}}" class="form-control @error ('nis') is-invalid @enderror" id="name" placeholder="nis">
                            @error('nis')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name</strong>
                            <input type="text" name="name" id="name" value="{{ old('name') ?? $student->name}}" class="form-control @error ('name') is-invalid @enderror" id="name" placeholder="name">
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Rombel:</strong>
                            <select name="rombel_id" id="rombel_id" class="form-control @error('rombel_id') is-invalid @enderror">
                                <option value="">-----rombel----</option>
                                @foreach($rombel as $rombel)
                                <option value="{{ $rombel->id }}" {{ $student->rombel_id == $rombel->id ? 'selected' : '' }}>{{ $rombel->rombel }}</option>
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
                            <select name="majors_id" id="majors_id" class="form-control @error('majors_id') is-invalid @enderror">
                                <option value="">-----majors----</option>
                                @foreach($major as $major)
                                <option value="{{ $major->id }}" {{ $student->majors_id == $major->id ? 'selected' : '' }}>{{ $major->majors }}</option>
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
                            <select name="rayon_id" id="rayon_id" class="form-control @error('rayon_id') is-invalid @enderror">
                                <option value="">-----rayon----</option>
                                @foreach($rayon as $rayon)
                                <option value="{{ $rayon->id }}" {{ $student->rayon_id == $rayon->id ? 'selected' : '' }}>{{ $rayon->rayon }}</option>
                                @endforeach
                            </select>
                            @error('rayon_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Grade</strong>
                            <select name="grade" id="grade" class="form-control @error('grade') is-invalid @enderror">
                                <option value="">-----Grade-----</option>
                                <option value="10" {{$student->grade == "10" ? "selected" : ""}}>10</option>
                                <option value="11" {{$student->grade == "11" ? "selected" : ""}}>11</option>
                                <option value="12" {{$student->grade == "12" ? "selected" : ""}}>12</option>
                            </select>
                            @error('grade')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Religion</strong>
                            <select name="religion" id="religion" class="form-control @error('religion') is-invalid @enderror">
                                <option value="">-----Religion-----</option>
                                <option value="islam" {{$student->religion == "islam" ? "selected" : ""}}>Islam</option>
                                <option value="protestan" {{$student->religion == "protestan" ? "selected" : ""}}>Protestan</option>
                                <option value="katolik" {{$student->religion == "katolik" ? "selected" : ""}}>Katolik</option>
                                <option value="hindu" {{$student->religion == "hindu" ? "selected" : ""}}>Hindu</option>
                                <option value="buddha" {{$student->religion == "buddha" ? "selected" : ""}}>Buddha</option>
                                <option value="khonghucu" {{$student->religion == "khonghucu" ? "selected" : ""}}>Khonghucu</option>
                            </select>
                            @error('religion')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Gender</strong>
                            <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror">
                                <option value="">-----Gender-----</option>
                                <option value="L" {{$student->gender == "L" ? "selected" : ""}}>Laki-Laki</option>
                                <option value="P" {{$student->gender == "P" ? "selected" : ""}}>Perempuan</option>
                            </select>
                            @error('gender')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Photo</strong>
                            <input type="file" name="photo" id="photo" class="form-control @error('photo') is-invalid @enderror" aria-describedby="photoHelp">
                                <div id="photoHelp" class="form-text">Tidak perlu diisi bila tidak ingin mengganti foto.</div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12" id="foto">
                        <div class="form-group">
                            <div id="deletefoto">
                                <input type="checkbox" name="delete_photo" id="delete_photo">
                                <label for="delete_photo" class="form-label">Hapus Foto Sekarang</label>
                            </div>
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