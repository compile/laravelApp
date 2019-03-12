@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10">
      @include('layouts.menu')
    <div class="card ">
      <div class="card-header">
        <h1>Author / Show #{{ $author->id }}</h1>
      </div>

      <div class="card-body">
        <div class="card-block bg-light">
          <div class="row">
            <div class="col-md-6">
              <a class="btn btn-link" href="{{ route('authors.index') }}"><- Back</a>
            </div>
            <div class="col-md-6">
              <a class="btn btn-sm btn-warning float-right mt-1" href="{{ route('authors.edit', $author->id) }}">
                Edit
              </a>
            </div>
          </div>
        </div>
        <br>

        <label>Name</label>
<p>
	{{ $author->name }}
</p> <label>Thumb</label>
<p>
	{{ $author->thumb }}
</p> <label>Works_count</label>
<p>
	{{ $author->works_count }}
</p> <label>Pop</label>
<p>
	{{ $author->pop }}
</p> <label>Order</label>
<p>
	{{ $author->order }}
</p>
      </div>
    </div>
  </div>
</div>

@endsection
