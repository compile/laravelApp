@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-10">
      @include('layouts.menu')
    <div class="card ">
      <div class="card-header">
        <h1>
          Channel
          <a class="btn btn-success float-xs-right" href="{{ route('channels.create') }}">Create</a>
        </h1>
      </div>

      <div class="card-body">
        @if($channels->count())
          <table class="table table-sm table-striped">
            <thead>
              <tr>
                <th class="text-xs-center">#</th>
                <th>Title</th> <th>Thumb</th> <th>Desc</th> <th>Works_count</th> <th>Status</th> <th>Order</th>
                <th class="text-xs-right">OPTIONS</th>
              </tr>
            </thead>

            <tbody>
              @foreach($channels as $channel)
              <tr>
                <td class="text-xs-center"><strong>{{$channel->id}}</strong></td>

                <td>{{$channel->title}}</td> <td>{{$channel->thumb}}</td> <td>{{$channel->desc}}</td> <td>{{$channel->works_count}}</td> <td>{{$channel->status}}</td> <td>{{$channel->order}}</td>

                <td class="text-xs-right">
                  <a class="btn btn-sm btn-primary" href="{{ route('channels.show', $channel->id) }}">
                    V
                  </a>

                  <a class="btn btn-sm btn-warning" href="{{ route('channels.edit', $channel->id) }}">
                    E
                  </a>

                  <form action="{{ route('channels.destroy', $channel->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-sm btn-danger">D </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! $channels->render() !!}
        @else
          <h3 class="text-xs-center alert alert-info">Empty!</h3>
        @endif
      </div>
    </div>
  </div>
</div>

@endsection
