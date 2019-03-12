@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-10">
      @include('layouts.menu')
    <div class="card ">
      <div class="card-header">
        <h1>
          Work
          <a class="btn btn-success float-xs-right" href="{{ route('works.create') }}">Create</a>
        </h1>
      </div>

      <div class="card-body">
        @if($works->count())
          <table class="table table-sm table-striped">
            <thead>
              <tr>
                <th class="text-xs-center">#</th>
                <th>Title</th> <th>Thumb</th> <th>Pid</th> <th>Uid</th> <th>Pop</th> <th>Index_recom</th> <th>Channel_recom</th> <th>Status</th> <th>Order</th>
                <th class="text-xs-right">OPTIONS</th>
              </tr>
            </thead>

            <tbody>
              @foreach($works as $work)
              <tr>
                <td class="text-xs-center"><strong>{{$work->id}}</strong></td>

                <td>{{ str_limit($work->title,10,'...')}}</td> <td><img src="{{$work->thumb}}"></td> <td>{{$work->pid}}</td> <td>{{$work->uid}}</td> <td>{{$work->pop}}</td> <td>{{$work->index_recom}}</td> <td>{{$work->channel_recom}}</td> <td>{{$work->status}}</td> <td>{{$work->order}}</td>

                <td class="text-xs-right">
                  <a class="btn btn-sm btn-primary" href="{{ route('works.show', $work->id) }}">
                    V
                  </a>

                  <a class="btn btn-sm btn-warning" href="{{ route('works.edit', $work->id) }}">
                    E
                  </a>

                  <form action="{{ route('works.destroy', $work->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-sm btn-danger">D </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! $works->render() !!}
        @else
          <h3 class="text-xs-center alert alert-info">Empty!</h3>
        @endif
      </div>
    </div>
  </div>
</div>

@endsection
