@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10">
      @include('layouts.menu')
    <div class="card ">
      <div class="card-header">
        <h1>Work / Show #{{ $work->id }}</h1>
      </div>

      <div class="card-body">
        <div class="card-block bg-light">
          <div class="row">
            <div class="col-md-6">
              <a class="btn btn-link" href="{{ route('works.index') }}"><- Back</a>
            </div>
            <div class="col-md-6">
              <a class="btn btn-sm btn-warning float-right mt-1" href="{{ route('works.edit', $work->id) }}">
                Edit
              </a>
            </div>
          </div>
        </div>
        <br>

        <label>Title</label>
<p>
	{{ $work->title }}
</p> <label>Thumb</label>
<p>
	{{ $work->thumb }}
</p> <label>Pid</label>
<p>
	{{ $work->pid }}
</p> <label>Uid</label>
<p>
	{{ $work->uid }}
</p> <label>Pop</label>
<p>
	{{ $work->pop }}
</p> <label>Index_recom</label>
<p>
	{{ $work->index_recom }}
</p> <label>Channel_recom</label>
<p>
	{{ $work->channel_recom }}
</p> <label>Status</label>
<p>
	{{ $work->status }}
</p> <label>Order</label>
<p>
	{{ $work->order }}
</p>
      </div>
    </div>
  </div>
</div>

@endsection
