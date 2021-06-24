@extends('student.template.dashboard')

@section('content')

<div class="main-content">
  <section class="section">

    <div class="row">
      <div class="col-lg-8">
        <div class="card" style="background-color: white;">
          <div class="card-header">
            <h3>{{ $task->title }}</h3>
            <p>{{ $task->teacher->name }}</p>{{ $task->rombel->rombel }} ( {{ date('D-m-y', strtotime($task->upload)) }} - {{ date('D-m-y', strtotime($task->deadline)) }} )
          </div>
          <div class="card-body">
            <div class="container">
              <h5>{!! $task->description !!}</h5>


              <div class="card" style="width:300px; height:35px; margin-top: 40px">
                <i class="far fa-file-alt" style="margin-left: 7px; margin-top: 10px; width:100px"></i>

                <div class="card-header" style="margin-top: -40px;">
                  <a target="_blank" href="/tugas/laporan/{{ $task->id }}" class="stretched-link">{{$task->file}}</a>
                </div>


              </div>

            </div>
            <canvas id="myChart" height="158"></canvas>
          </div>
        </div>
      </div>


      <div class="col-lg-4">
        <div class="card gradient-bottom">
          <div class="card-header">
            <h4>Kumpulkan Tugas</h4>
          </div>


          <div class="container">
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Input Tugas
              </button>


              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <div>
                  <form action="{{route('student.collect.store')}}" method="POST">
                    @csrf
                    <input type="hidden" name="task_id" value="{{ $task->id }}">
                    <div class="container">
                      <div class="form-group">
                        <label for="exampleInputPassword1">upload</label>
                        <input name="upload" type="file" class="form-control" id="exampleInputPassword1">
                      </div>

                      {{-- <div class="form-group">
                        <label for="exampleInputPassword1">keterangan</label>
                        <input name="keterangan" type="nis" class="form-control" id="exampleInputPassword1" placeholder="Masukan Keterangan">
                      </div> --}}

                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>


                </div>

              </div>
            </div>

          </div>


          <div class="card-body" id="top-5-scroll">
            <div class="table-responsive">

              <table class="table table-sm" id="example">
                <thead>
                  <tr>

                  </tr>
                </thead>


              </table>
            </div>

            <div class="table-responsive">
              <table class="table table-sm">
                <thead>
                  <tr>



                  </tr>
                </thead>

              </table>
            </div>
            </ul>
          </div>
          <div class="card-footer pt-3 d-flex justify-content-center">


          </div>
        </div>
      </div>
  </section>
</div>




@endsection