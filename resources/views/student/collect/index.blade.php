@extends('student.template.dashboard')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <div>
                <h2>Collect</h2>
            </div>
        </div>           
        <div class="card-body">
            @foreach($tasks as $task)
                <div class="card" style="height: 60px">
                <i class="far fa-file-alt" style="margin-left: 10px; margin-top: 20px"></i>
                <div class="container">
                    <div class="card-header" style="margin-top: -50px;">
                        <h4>{{ $task->title }}</h4>
                        <a href="{{ route('student.collect.show', $task->id) }}" class="stretched-link"></a>
                    </div>
                    <div class="card-body" style="margin-top: -45px;">
                        {{ $task->rombel->rombel }} ( {{ date('D-m-Y', strtotime($task->upload)) }} - {{ date('D-m-Y', strtotime($task->deadline)) }} )
                    </div>
                    {{-- <div class="card-header" style="margin-top: -50px;">
                        <h4>{{ $task->teacher->name }} menugaskan "{{ $task->title}}"</h4>
                        <a href="{{ route('student.collect.show', $task->id) }}" class="stretched-link"></a>
                    </div>
                    <div class="card-body" style="margin-top: -45px;">
                        {{ $task->upload }} - {{ $task->deadline}}
                    </div> --}}
                </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection