@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10">
      @include('layouts.menu')
    <div class="card ">
      <div class="card-header">
        <h1>Channel / Show #{{ $channel->id }}</h1>
      </div>

      <div class="card-body">
        <div class="card-block bg-light">
          <div class="row">
            <div class="col-md-6">
              <a class="btn btn-link" href="{{ route('channels.index') }}"><- Back</a>
            </div>
            <div class="col-md-6">
              <a class="btn btn-sm btn-warning float-right mt-1" href="{{ route('channels.edit', $channel->id) }}">
                Edit
              </a>
            </div>
          </div>
        </div>
        <br>

        <label>Title</label>
<p>
	{{ $channel->title }}
</p> <label>Thumb</label>
<p>
	{{ $channel->thumb }}
</p> <label>Desc</label>
<p>
	{{ $channel->desc }}
</p> <label>Works_count</label>
<p>
	{{ $channel->works_count }}
</p> <label>Status</label>
<p>
	{{ $channel->status }}
</p> <label>Order</label>
<p>
	{{ $channel->order }}
</p>
      </div>
    </div>
  </div>
</div>

@endsection
