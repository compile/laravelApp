@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-10">
      @include('layouts.menu')
    <div class="card ">
      <div class="card-header">
        <h1>
          Author
          <a class="btn btn-success float-xs-right" href="{{ route('authors.create') }}">Create</a>
        </h1>
      </div>

      <div class="card-body">
        @if($authors->count())
          <table class="table table-sm table-striped">
            <thead>
              <tr>
                <th class="text-xs-center">#</th>
                <th>Name</th> <th>Thumb</th> <th>Works_count</th> <th>Pop</th> <th>Order</th>
                <th class="text-xs-right">OPTIONS</th>
              </tr>
            </thead>

            <tbody>
              @foreach($authors as $author)
              <tr>
                <td class="text-xs-center"><strong>{{$author->id}}</strong></td>

                <td>{{$author->name}}</td> <td>{{$author->thumb}}</td> <td>{{$author->works_count}}</td> <td>{{$author->pop}}</td> <td>{{$author->order}}</td>

                <td class="text-xs-right">
                  <a class="btn btn-sm btn-primary" href="{{ route('authors.show', $author->id) }}">
                    V
                  </a>

                  <a class="btn btn-sm btn-warning" href="{{ route('authors.edit', $author->id) }}">
                    E
                  </a>

                  <form action="{{ route('authors.destroy', $author->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-sm btn-danger">D </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! $authors->render() !!}
        @else
          <h3 class="text-xs-center alert alert-info">Empty!</h3>
        @endif
      </div>
    </div>
  </div>
</div>

@endsection
