@extends('layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-white">All users</div>
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
                                            {{$row->role->name}}
                                        </td>
                                        <td>
                                            <a href="{{route('user.view', $row->id)}}" class=" btn-success btn-sm white-text"><i class="far fa-eye"></i></a>
                                            <a href="#" class=" btn-primary btn-sm"><i class="far fa-edit"></i></a>
                                            <a href="#" class=" btn-danger btn-sm text-white"><i class="far fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
