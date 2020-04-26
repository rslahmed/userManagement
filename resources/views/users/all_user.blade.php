@extends('layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-white d-flex align-items-center justify-content-between">
                        <h4>All users</h4>
                        <a href="{{route('register')}}" class="btn btn-sm bg-white text-dark font-weight-bold">Add User</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NAME</th>
                                    <th>EMAIL</th>
                                    <th>STATUS</th>
                                    <th>ROLE</th>
                                    <th>ACTION</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($user->all() as $row)
                                    <tr>
                                        <td>{{$row->id}}</td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->email}}</td>
                                        <td>@if($row->status == 1)Active @else Deactive @endif</td>
                                        <td class="text-capitalize">
                                            @if($row->role)
                                                {{$row->role->name}}
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('user.view', $row->id)}}" class=" btn-success btn-sm white-text"><i class="far fa-eye"></i></a>
                                            @if($row->id != 1 )
                                                @if(auth()->user()->role && auth()->user()->role->user_edit)
                                                <a href="{{route('user.edit', $row->id)}}" class=" btn-primary btn-sm"><i class="far fa-edit"></i></a>
                                                @endif
                                                @if(auth()->user()->role && auth()->user()->role->user_delete)
                                                <a href="{{route('user.delete', $row->id)}}" class=" btn-danger btn-sm text-white delete_btn"><i class="far fa-trash-alt"></i></a>
                                                @endif
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <a href="{{route('user.trash')}}"><i class="far fa-trash-alt"></i> View trash</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
