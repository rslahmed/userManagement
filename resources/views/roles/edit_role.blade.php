@extends('layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-8 m-auto">
                <div class="card">
                    <div class="card-header text-white">Edit Role</div>
                    <div class="card-body">
                        <form action="{{route('role.update', $role->id)}}" method="post">
                            @csrf
                            <div class="md-form">
                                <input name="name" type="text" class="form-control" value="{{$role->name}}">
                                <label for="form1" class="active">Role Name</label>
                            </div>
                            <div class="activity-log d-flex mb-4">
                                <div class="switch w-25">
                                    <h6>Activity log</h6>
                                    <div class="position-relative">
                                        <label>
                                            Off
                                            <input type="hidden" name="activity_log" value="0">
                                            <input type="checkbox" id="activityLog" name="activity_log" value="1" @if($role->activity_log == 1) checked  @endif>
                                            <span class="lever"></span> On
                                        </label>
                                    </div>
                                </div>
                                <div class="mt-4 activity_check">
                                    <fieldset class="form-check">
                                        <input name="activity_delete" class="form-check-input" type="hidden" value="0">
                                        <input name="activity_delete" class="form-check-input" type="checkbox" id="deleteLog" value="1" @if($role->activity_delete == 1) checked  @endif>
                                        <label class="form-check-label" for="deleteLog">Delete log</label>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="user-access d-flex mb-4">
                                <div class="switch w-25">
                                    <h6>User access</h6>
                                    <div class="pY-4 position-relative">
                                        <label>
                                            Off
                                            <input name="user_access" type="hidden" value="0">
                                            <input name="user_access" id="userAccess" type="checkbox" value="1" @if($role->user_access == 1) checked  @endif>
                                            <span class="lever"></span> On
                                        </label>
                                    </div>
                                </div>
                                <div class="mt-4 user_check">
                                    <fieldset class="form-check">
                                        <input class="form-check-input" name="user_add" type="hidden" value="0">
                                        <input class="form-check-input" name="user_add" type="checkbox" id="addUser" value="1" @if($role->user_add == 1) checked  @endif>
                                        <label class="form-check-label" for="addUser">Add user</label>
                                    </fieldset>
                                </div>
                                <div class="mt-4 user_check">
                                    <fieldset class="form-check">
                                        <input class="form-check-input" name="user_edit" type="hidden" value="0">
                                        <input class="form-check-input" name="user_edit" type="checkbox" id="modifyUser" value="1" @if($role->user_edit == 1) checked  @endif>
                                        <label class="form-check-label" for="modifyUser">Modify user</label>
                                    </fieldset>
                                </div>
                                <div class="mt-4 user_check">
                                    <fieldset class="form-check">
                                        <input class="form-check-input" name="user_delete" type="hidden" value="0">
                                        <input class="form-check-input" name="user_delete" type="checkbox" id="deleteUser" value="1" @if($role->user_delete == 1) checked  @endif>
                                        <label class="form-check-label" for="deleteUser">Delete user</label>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="user-access d-flex mb-4">
                                <div class="switch w-25">
                                    <h6>Role access</h6>
                                    <div class="pY-4 position-relative">
                                        <label>
                                            Off
                                            <input name="role_access" type="hidden" value="0">
                                            <input name="role_access" id="userAccess" type="checkbox" value="1" @if($role->role_access == 1) checked  @endif>
                                            <span class="lever"></span> On
                                        </label>
                                    </div>
                                </div>
                                <div class="mt-4 role-check">
                                    <fieldset class="form-check">
                                        <input class="form-check-input" name="role_add" type="hidden" value="0">
                                        <input class="form-check-input" name="role_add" type="checkbox" id="addRole" value="1" @if($role->role_add == 1) checked  @endif>
                                        <label class="form-check-label" for="addRole">Add role</label>
                                    </fieldset>
                                </div>
                                <div class="mt-4 role-check">
                                    <fieldset class="form-check">
                                        <input class="form-check-input" name="role_edit" type="hidden" value="0">
                                        <input class="form-check-input" name="role_edit" type="checkbox" id="modifyRole" value="1" @if($role->role_edit == 1) checked  @endif>
                                        <label class="form-check-label" for="modifyRole">Modify role</label>
                                    </fieldset>
                                </div>
                                <div class="mt-4 role-check">
                                    <fieldset class="form-check">
                                        <input class="form-check-input" name="role_delete" type="hidden" value="0">
                                        <input class="form-check-input" name="role_delete" type="checkbox" id="deleteRole" value="1" @if($role->role_delete == 1) checked  @endif>
                                        <label class="form-check-label" for="deleteRole">Delete role</label>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="user-access d-flex">
                                <div class="switch w-25">
                                    <h6>Setting access</h6>
                                    <div class="pY-4 position-relative">
                                        <label>
                                            Off
                                            <input name="setting_access" type="hidden" value="0">
                                            <input name="setting_access" id="settingAccess" type="checkbox" value="1" @if($role->setting_access == 1) checked  @endif>
                                            <span class="lever"></span> On
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <button class="btn btn-primary" type="submit">Update Role</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
