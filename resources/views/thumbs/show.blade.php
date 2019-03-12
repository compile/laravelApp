@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10">
      @include('layouts.menu')
    <div class="card ">
      <div class="card-header">
        <h1>Thumb / Show #{{ $thumb->id }}</h1>
      </div>

      <div class="card-body">
        <div class="card-block bg-light">
          <div class="row">
            <div class="col-md-6">
              <a class="btn btn-link" href="{{ route('thumbs.index') }}"><- Back</a>
            </div>
            <div class="col-md-6">
              <a class="btn btn-sm btn-warning float-right mt-1" href="{{ route('thumbs.edit', $thumb->id) }}">
                Edit
              </a>
            </div>
          </div>
        </div>
        <br>

        <label>Path</label>
<p>
	{{ $thumb->path }}
</p> <label>Status</label>
<p>
	{{ $thumb->status }}
</p> <label>Order</label>
<p>
	{{ $thumb->order }}
</p>
      </div>
    </div>
  </div>
</div>

@endsection
