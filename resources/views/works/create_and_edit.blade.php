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
                    <select id="mySelect" name="Pid" onchange="changeThumb(this[selectedIndex].value)">
                        @foreach ($thumbs as $path)
                            <option value="{{ $path->path }}">{{ $path->path }}</option></p>
                        @endforeach
                    </select>
                	<input name="thumb" id="thumb-field" class="form-control" value="{{ old('thumb', $work->thumb ) }}"/>
                </div>
              <div class="form-group">
                  <label for="path-field">Path</label>
                  <input name="path" id="path-field" class="form-control" value="{{ old('path', $work->path ) }}"/>
              </div>
                <div class="form-group">
                    <label for="pid-field">Pid</label> <select id="mySelect" name="Pid" onchange="changePid(this[selectedIndex].value)">
                        @foreach ($channels as $pindao)
                            <option value="{{ $pindao->id }}">{{ $pindao->title }}</option></p>
                        @endforeach
                        <option value="test">test</option>
                    </select>
                    <input class="form-control" type="text" name="pid" id="pid-field" value="{{ old('pid', $work->pid ) }}" />
                </div> 
                <div class="form-group">
                    <label for="uid-field">Uid</label>&nbsp;
                    <select name="Uid" onchange="changeUid(this[selectedIndex].value)">
                        @foreach ($authors as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option></p>
                        @endforeach

                    </select>
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

    <script>

        function changePid(val){
           document.getElementById('pid-field').value=val;
        }

        function changeThumb(val){
            document.getElementById('thumb-field').value=val;
        }

        function changeUid(val){
            document.getElementById('uid-field').value=val;
        }


    </script>

@endsection
