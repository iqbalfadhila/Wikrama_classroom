@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Add New task</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('teacher.task.index') }}"> Back</a>
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
               
            <form action="{{ route('teacher.task.store') }}" method="POST">
                @csrf
            
                 <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Title:</strong>
                            <input type="text" name="title" class="form-control" placeholder="Title">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Teacher:</strong>
                            <input readonly name="teacher_id" type="text" class="form-control" id="name" value="{{Auth::user()->id}}">
                            {{-- <select name="teacher_id" id="teacher_id" class="form-control @error('teacher_id') is-invalid @enderror">
                                <option>-----Teacher-----</option>
                                @foreach($teacher as $teacher)
                                    <option value="{{ $teacher->id }}" {{$teacher->id == old('teacher_id') ? "selected" : ""}}>{{ $teacher->name }}</option>
                                @endforeach
                            </select> --}}
                            @error('teacher_id')
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
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Lesson:</strong>
                            <input readonly name="lesson_id" type="text" class="form-control" id="name" value="{{$teacher->lesson_id}}">
                            {{-- <select name="lesson_id" id="lesson_id" class="form-control @error('lesson_id') is-invalid @enderror">
                                <option>-----Lesson-----</option>
                                @foreach($lesson as $lesson)
                                    <option value="{{ $lesson->id }}" {{$lesson->id == old('lesson_id') ? "selected" : ""}}>{{ $lesson->lesson }}</option>
                                @endforeach
                            </select> --}}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Upload:</strong>
                            <input type="date" name="upload" class="form-control">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Deadline:</strong>
                            <input type="date" name="deadline" class="form-control">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Description:</strong>
                            <input type="text" name="description" class="form-control" placeholder="Description">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>File:</strong>
                            <input type="file" name="file" class="form-control" placeholder="File">
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