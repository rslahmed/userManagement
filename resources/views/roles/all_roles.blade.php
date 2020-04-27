@extends('layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 m-auto">
                <div class="card">
                    <div class="card-header text-white d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">All Roles</h4>
                        <a href="{{route('role.add')}}"
                           class="btn bg-white text-dark btn-sm text-uppercase font-weight-bold">Add Role</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>ROLE NAME</th>
                                    <th>ACTION</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($role->all() as $row)
                                    <tr>
                                        <td>{{$row->id}}</td>

                                        <td class="text-capitalize">{{$row->name}}</td>
                                        <td>
                                            <a href="{{route('role.view', $row->id)}}"
                                               class=" btn-success btn-sm white-text"><i class="far fa-eye"></i></a>
                                            @if($row->id != 1)
                                                @if(auth()->user()->role && auth()->user()->role->role_edit)
                                                    <a href="{{route('role.edit', $row->id)}}"
                                                       class=" btn-primary btn-sm"><i class="far fa-edit"></i></a>
                                                @endif
                                                @if(auth()->user()->role && auth()->user()->role->role_delete)
                                                    <a href="{{route('role.destroy', $row->id)}}"
                                                       class="btn-danger btn-sm text-white delete_btn"><i
                                                            class="far fa-trash-alt"></i></a>
                                                @endif
                                            @endif
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $role->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
