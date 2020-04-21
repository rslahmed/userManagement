@extends('layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-white">View Role</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover single-view-table">
                                <tr>
                                    <th>ID</th>
                                    <td>{{$role->id}}</td>
                                </tr>
                                <tr>
                                    <th>Role Name</th>
                                    <td>{{$role->name}}</td>
                                </tr>
                                <tr>
                                    <th>Access Activity</th>
                                    <td>
                                        @if($role->activity_log == 1) Yes @else No @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Delete Activity</th>
                                    <td>
                                        @if($role->activity_delete == 1) Yes @else No @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>User access</th>
                                    <td>
                                        @if($role->user_access == 1) Yes @else No @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Add User</th>
                                    <td>
                                        @if($role->user_add == 1) Yes @else No @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Edit User</th>
                                    <td>
                                        @if($role->user_edit == 1) Yes @else No @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Delete User</th>
                                    <td>
                                        @if($role->user_delete == 1) Yes @else No @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Access Role</th>
                                    <td>
                                        @if($role->role_access == 1) Yes @else No @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Add Role</th>
                                    <td>
                                        @if($role->role_add == 1) Yes @else No @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Edit Role</th>
                                    <td>
                                        @if($role->role_edit == 1) Yes @else No @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Delete Role </th>
                                    <td>
                                        @if($role->role_delete == 1) Yes @else No @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Access Setting</th>
                                    <td>
                                        @if($role->setting_access == 1) Yes @else No @endif
                                    </td>
                                </tr>
                                @if($role->id != 1)
                                <tr>
                                    <th>ACTION</th>
                                    <td>
                                        <a href="{{route('role.edit', $role->id)}}" class=" btn-primary btn-sm"><i class="far fa-edit"></i></a>
                                        <a href="{{route('role.destroy', $role->id)}}" class="btn-danger btn-sm text-white delete_btn"><i class="far fa-trash-alt"></i></a>
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
