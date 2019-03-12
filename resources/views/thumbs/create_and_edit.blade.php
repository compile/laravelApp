@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10">
      @include('layouts.menu')
    <div class="card ">

      <div class="card-header">
        <h1>
          Thumb /
          @if($thumb->id)
            Edit #{{ $thumb->id }}
          @else
            Create
          @endif
        </h1>
      </div>

      <div class="card-body">
        @if($thumb->id)
          <form action="{{ route('thumbs.update', $thumb->id) }}" method="POST" accept-charset="UTF-8">
          <input type="hidden" name="_method" value="PUT">
        @else
          <form action="{{ route('thumbs.store') }}" method="POST" accept-charset="UTF-8">
        @endif

          @include('common.error')

          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          
                <div class="form-group">
                	<label for="path-field">Path</label>
                	<input class="form-control" type="text" name="path" id="path-field" value="{{ old('path', $thumb->path ) }}" />
                </div> 
                <div class="form-group">
                    <label for="status-field">Status</label>
                    <input class="form-control" type="text" name="status" id="status-field" value="{{ old('status', $thumb->status ) }}" />
                </div> 
                <div class="form-group">
                    <label for="order-field">Order</label>
                    <input class="form-control" type="text" name="order" id="order-field" value="{{ old('order', $thumb->order ) }}" />
                </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-link float-xs-right" href="{{ route('thumbs.index') }}"> <- Back</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
