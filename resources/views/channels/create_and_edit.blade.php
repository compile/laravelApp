@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10">
      @include('layouts.menu')
    <div class="card ">

      <div class="card-header">
        <h1>
          Channel /
          @if($channel->id)
            Edit #{{ $channel->id }}
          @else
            Create
          @endif
        </h1>
      </div>

      <div class="card-body">
        @if($channel->id)
          <form action="{{ route('channels.update', $channel->id) }}" method="POST" accept-charset="UTF-8">
          <input type="hidden" name="_method" value="PUT">
        @else
          <form action="{{ route('channels.store') }}" method="POST" accept-charset="UTF-8">
        @endif

          @include('common.error')

          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          
                <div class="form-group">
                	<label for="title-field">Title</label>
                	<input class="form-control" type="text" name="title" id="title-field" value="{{ old('title', $channel->title ) }}" />
                </div> 
                <div class="form-group">
                	<label for="thumb-field">Thumb</label>
                	<textarea name="thumb" id="thumb-field" class="form-control" rows="3">{{ old('thumb', $channel->thumb ) }}</textarea>
                </div> 
                <div class="form-group">
                	<label for="desc-field">Desc</label>
                	<textarea name="desc" id="desc-field" class="form-control" rows="3">{{ old('desc', $channel->desc ) }}</textarea>
                </div> 
                <div class="form-group">
                    <label for="works_count-field">Works_count</label>
                    <input class="form-control" type="text" name="works_count" id="works_count-field" value="{{ old('works_count', $channel->works_count ) }}" />
                </div> 
                <div class="form-group">
                    <label for="status-field">Status</label>
                    <input class="form-control" type="text" name="status" id="status-field" value="{{ old('status', $channel->status ) }}" />
                </div> 
                <div class="form-group">
                    <label for="order-field">Order</label>
                    <input class="form-control" type="text" name="order" id="order-field" value="{{ old('order', $channel->order ) }}" />
                </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-link float-xs-right" href="{{ route('channels.index') }}"> <- Back</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
