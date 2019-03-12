@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10">
      @include('layouts.menu')
    <div class="card ">

      <div class="card-header">
        <h1>
          Work /
          @if($work->id)
            Edit #{{ $work->id }}
          @else
            Create
          @endif
        </h1>
      </div>

      <div class="card-body">
        @if($work->id)
          <form action="{{ route('works.update', $work->id) }}" method="POST" accept-charset="UTF-8">
          <input type="hidden" name="_method" value="PUT">
        @else
          <form action="{{ route('works.store') }}" method="POST" accept-charset="UTF-8">
        @endif

          @include('common.error')

          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          
                <div class="form-group">
                	<label for="title-field">Title</label>
                	<input class="form-control" type="text" name="title" id="title-field" value="{{ old('title', $work->title ) }}" />
                </div> 
                <div class="form-group">
                	<label for="thumb-field">Thumb</label>
                	<textarea name="thumb" id="thumb-field" class="form-control" rows="3">{{ old('thumb', $work->thumb ) }}</textarea>
                </div> 
                <div class="form-group">
                    <label for="pid-field">Pid</label>
                    <input class="form-control" type="text" name="pid" id="pid-field" value="{{ old('pid', $work->pid ) }}" />
                </div> 
                <div class="form-group">
                    <label for="uid-field">Uid</label>
                    <input class="form-control" type="text" name="uid" id="uid-field" value="{{ old('uid', $work->uid ) }}" />
                </div> 
                <div class="form-group">
                    <label for="pop-field">Pop</label>
                    <input class="form-control" type="text" name="pop" id="pop-field" value="{{ old('pop', $work->pop ) }}" />
                </div> 
                <div class="form-group">
                    <label for="index_recom-field">Index_recom</label>
                    <input class="form-control" type="text" name="index_recom" id="index_recom-field" value="{{ old('index_recom', $work->index_recom ) }}" />
                </div> 
                <div class="form-group">
                    <label for="channel_recom-field">Channel_recom</label>
                    <input class="form-control" type="text" name="channel_recom" id="channel_recom-field" value="{{ old('channel_recom', $work->channel_recom ) }}" />
                </div> 
                <div class="form-group">
                    <label for="status-field">Status</label>
                    <input class="form-control" type="text" name="status" id="status-field" value="{{ old('status', $work->status ) }}" />
                </div> 
                <div class="form-group">
                    <label for="order-field">Order</label>
                    <input class="form-control" type="text" name="order" id="order-field" value="{{ old('order', $work->order ) }}" />
                </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-link float-xs-right" href="{{ route('works.index') }}"> <- Back</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
