@extends('admin.template.dashboard')
@section('content')
<div class="container">
    <div class="card">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="card-header">
                    <div class="pull-left">
                        <h2>Edit Lesson</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="pull-right">
                <a class="btn btn-secondary" href="{{ route('admin.lesson.index') }}"> Back</a>
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
      
            <form action="{{ route('admin.lesson.update',$lesson->id) }}" method="POST">
                @csrf
                @method('PUT')
           
                 <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Lesson</strong>
                            <input type="text" name="lesson" value="{{ old('lesson') ?? $lesson->lesson}}" class="form-control @error ('lesson') is-invalid @enderror" id="name" placeholder="lesson">
                            @error('lesson')
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