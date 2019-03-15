@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-10">
      @include('layouts.menu')
    <div class="card ">
      <div class="card-header">
        <h1>
          Thumb
          <a class="btn btn-success float-xs-right" href="{{ route('works.create') }}">Create</a>
        </h1>
      </div>

      <div class="card-body">
          <div class="panel-body">
              <form class="form-horizontal" role="form" method="POST" action="" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <input type="file" id="file" name="file" style="padding: 17px;">
                  <div class="form-group">
                      <div class="col-md-8 col-md-offset-4">
                          <button type="submit" class="btn btn-primary">
                              确认上传
                          </button>
                      </div>
                  </div>
              </form>
          </div>
      </div>
    </div>
  </div>
</div>

@endsection
