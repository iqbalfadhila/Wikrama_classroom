@extends('teacher.template.dashboard')
@section('content')
<div class="container">
    <div class="card">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="card-header">
                    <div class="pull-left">
                        <h2>Edit Task</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="pull-right">
                <a class="btn btn-secondary" href="{{ route('teacher.task.index') }}"> Back</a>
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
      
            <form action="{{ route('teacher.task.update',$task->id) }}" method="POST">
                @csrf
                @method('PUT')
           
                 <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Title</strong>
                            <input type="text" name="title" id="title" value="{{ old('title') ?? $task->title}}" class="form-control @error ('title') is-invalid @enderror" id="name" placeholder="title">
                            @error('title')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Teacher</strong>
                            <input readonly name="teacher_id" type="text" class="form-control" id="name" value="{{Auth::user()->id}}">
                            {{-- <input readonly type="text" name="teacher_id" id="teacher_id" value="{{ old('teacher_id') ?? $task->teacher_id}}" class="form-control @error ('teacher_id') is-invalid @enderror" id="teacher_id" placeholder="teacher_id"> --}}
                            @error('teacher_id')
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
                                <option value="{{ $rombel->id }}" {{ $task->rombel_id == $rombel->id ? 'selected' : '' }}>{{ $rombel->rombel }}</option>
                                @endforeach
                            </select>
                            @error('rombel_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Lesson:</strong>
                            <input readonly name="lesson_id" type="text" class="form-control" id="name" value="{{$teacher->lesson_id}}">
                            {{-- <select name="lesson_id" id="lesson_id" class="form-control @error('lesson_id') is-invalid @enderror">
                                <option value="">-----lesson----</option>
                                @foreach($lesson as $lesson)
                                <option value="{{ $lesson->id }}" {{ $task->lesson_id == $lesson->id ? 'selected' : '' }}>{{ $lesson->lesson }}</option>
                                @endforeach
                            </select> --}}
                            @error('lesson_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>upload</strong>
                            <input type="date" name="upload" id="upload" value="{{ old('upload') ?? $task->upload}}" class="form-control @error ('upload') is-invalid @enderror" id="name" placeholder="upload">
                            @error('upload')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>deadline</strong>
                            <input type="date" name="deadline" id="deadline" value="{{ old('deadline') ?? $task->deadline}}" class="form-control @error ('deadline') is-invalid @enderror" id="name" placeholder="deadline">
                            @error('deadline')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Description</strong>
                            <input type="text" name="description" id="description" value="{{ old('description') ?? $task->description}}" class="form-control @error ('description') is-invalid @enderror" id="name" placeholder="description">
                            @error('description')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>File</strong>
                            <input type="file" name="file" id="file" class="form-control @error('file') is-invalid @enderror" aria-describedby="fileHelp">
                                <div id="fileHelp" class="form-text">Tidak perlu diisi bila tidak ingin mengganti foto.</div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12" id="foto">
                        <div class="form-group">
                            <div id="deletefile">
                                <input type="checkbox" name="delete_file" id="delete_file">
                                <label for="delete_file" class="form-label">Hapus Foto Sekarang</label>
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