@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10">
      @include('layouts.menu')
    <div class="card ">

      <div class="card-header">
        <h1>
          Author /
          @if($author->id)
            Edit #{{ $author->id }}
          @else
            Create
          @endif
        </h1>
      </div>

      <div class="card-body">
        @if($author->id)
          <form action="{{ route('authors.update', $author->id) }}" method="POST" accept-charset="UTF-8">
          <input type="hidden" name="_method" value="PUT">
        @else
          <form action="{{ route('authors.store') }}" method="POST" accept-charset="UTF-8">
        @endif

          @include('common.error')

          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          
                <div class="form-group">
                	<label for="name-field">Name</label>
                	<input class="form-control" type="text" name="name" id="name-field" value="{{ old('name', $author->name ) }}" />
                </div> 
                <div class="form-group">
                	<label for="thumb-field">Thumb</label>
                	<textarea name="thumb" id="thumb-field" class="form-control" rows="3">{{ old('thumb', $author->thumb ) }}</textarea>
                </div> 
                <div class="form-group">
                    <label for="works_count-field">Works_count</label>
                    <input class="form-control" type="text" name="works_count" id="works_count-field" value="{{ old('works_count', $author->works_count ) }}" />
                </div> 
                <div class="form-group">
                    <label for="pop-field">Pop</label>
                    <input class="form-control" type="text" name="pop" id="pop-field" value="{{ old('pop', $author->pop ) }}" />
                </div> 
                <div class="form-group">
                    <label for="order-field">Order</label>
                    <input class="form-control" type="text" name="order" id="order-field" value="{{ old('order', $author->order ) }}" />
                </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-link float-xs-right" href="{{ route('authors.index') }}"> <- Back</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
