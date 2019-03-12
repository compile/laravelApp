@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-10">
      @include('layouts.menu')
    <div class="card ">
      <div class="card-header">
        <h1>
          Thumb
          <a class="btn btn-success float-xs-right" href="{{ route('thumbs.create') }}">Create</a>
        </h1>
      </div>

      <div class="card-body">
        @if($thumbs->count())
          <table class="table table-sm table-striped">
            <thead>
              <tr>
                <th class="text-xs-center">#</th>
                <th>Path</th> <th>Status</th> <th>Order</th>
                <th class="text-xs-right">OPTIONS</th>
              </tr>
            </thead>

            <tbody>
              @foreach($thumbs as $thumb)
              <tr>
                <td class="text-xs-center"><strong>{{$thumb->id}}</strong></td>

                <td>{{$thumb->path}}</td> <td>{{$thumb->status}}</td> <td>{{$thumb->order}}</td>

                <td class="text-xs-right">
                  <a class="btn btn-sm btn-primary" href="{{ route('thumbs.show', $thumb->id) }}">
                    V
                  </a>

                  <a class="btn btn-sm btn-warning" href="{{ route('thumbs.edit', $thumb->id) }}">
                    E
                  </a>

                  <form action="{{ route('thumbs.destroy', $thumb->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-sm btn-danger">D </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! $thumbs->render() !!}
        @else
          <h3 class="text-xs-center alert alert-info">Empty!</h3>
        @endif
      </div>
    </div>
  </div>
</div>

@endsection
