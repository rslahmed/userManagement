@extends('layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 m-auto">
                <div class="card">
                    <div class="card-header text-white">
                        <h4 class="mb-0">Activity log</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <tbody>
                                @foreach($activity->all() as $row)
                                    <tr>
                                        <td>A {{$row->event_target}} was {{$row->event_name}} by {{$row->user_name}} {{$row->created_at->diffForHumans()}} </td>
                                        @if(auth()->user()->role && auth()->user()->role->activity_delete == 1)
                                        <td>
                                            <a href="{{route('activity.destroy', $row->id)}}" class="btn-danger btn-sm text-white delete_btn"><i class="far fa-trash-alt"></i></a>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $activity->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
