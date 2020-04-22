@extends('layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-white">All users</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover single-view-table">
                                <tr>
                                    <th>ID</th>
                                    <td>{{$user->id}}</td>
                                </tr>
                                <tr>
                                    <th>NAME</th>
                                    <td>{{$user->name}}</td>
                                </tr>
                                <tr>
                                    <th>EMAIL</th>
                                    <td>{{$user->email}}</td>
                                </tr>
                                <tr>
                                    <th>STATUS</th>
                                    <td>
                                        @if($user->status == 1) Active @else Deactive @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>ROLE</th>
                                    <td>
                                        @if($user->role)
                                            {{$user->role->name}}
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                </tr>
                                @if($user->id != 1)
                                <tr>
                                    <th>ACTION</th>
                                    <td>
                                        <a href="{{route('user.edit', $user->id)}}" class=" btn-primary btn-sm"><i class="far fa-edit"></i></a>
                                        <a href="{{route('user.destroy', $user->id)}}" class="btn-danger btn-sm text-white"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                    @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
