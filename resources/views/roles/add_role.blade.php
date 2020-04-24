@extends('layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-8 m-auto">
                <div class="card">
                    <div class="card-header text-white">Add Role</div>
                    <div class="card-body">
                        <form action="{{route('role.store')}}" method="post">
                            @csrf
                            <div class="md-form">
                                <input name="name" type="text" class="form-control" required>
                                <label for="form1" class="active">Role Name</label>
                            </div>
                            <div class="access_wrap d-flex mb-4">
                                <div class="switch w-25">
                                    <h6>Activity log</h6>
                                    <div class="position-relative">
                                        <label>
                                            Off
                                            <input type="hidden" name="activity_log" value="0">
                                            <input class="primary_access" type="checkbox" id="activityLog" name="activity_log" value="1">
                                            <span class="lever"></span> On
                                        </label>
                                    </div>
                                </div>
                                <div class="mt-4 activity_check single-check">
                                    <fieldset class="form-check">
                                        <input name="activity_delete" class="form-check-input" type="hidden" value="0">
                                        <input  name="activity_delete" class="form-check-input" type="checkbox" id="deleteLog" value="1">
                                        <label class="form-check-label" for="deleteLog">Delete log</label>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="access_wrap d-flex mb-4">
                                <div class="switch w-25">
                                    <h6>User access</h6>
                                    <div class="pY-4 position-relative">
                                        <label>
                                            Off
                                            <input name="user_access" type="hidden" value="0">
                                            <input class="primary_access" name="user_access" id="userAccess" type="checkbox" value="1">
                                            <span class="lever"></span> On
                                        </label>
                                    </div>
                                </div>
                                <div class="mt-4 user_check single-check">
                                    <fieldset class="form-check">
                                        <input class="form-check-input" name="user_add" type="hidden" value="0">
                                        <input class="form-check-input" name="user_add" type="checkbox" id="addUser" value="1">
                                        <label class="form-check-label" for="addUser">Add user</label>
                                    </fieldset>
                                </div>
                                <div class="mt-4 user_check single-check">
                                    <fieldset class="form-check">
                                        <input class="form-check-input" name="user_edit" type="hidden" value="0">
                                        <input class="form-check-input" name="user_edit" type="checkbox" id="modifyUser" value="1">
                                        <label class="form-check-label" for="modifyUser">Modify user</label>
                                    </fieldset>
                                </div>
                                <div class="mt-4 user_check single-check">
                                    <fieldset class="form-check">
                                        <input class="form-check-input" name="user_delete" type="hidden" value="0">
                                        <input class="form-check-input" name="user_delete" type="checkbox" id="deleteUser" value="1">
                                        <label class="form-check-label" for="deleteUser">Delete user</label>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="access_wrap d-flex mb-4">
                                <div class="switch w-25">
                                    <h6>Role access</h6>
                                    <div class="pY-4 position-relative">
                                        <label>
                                            Off
                                            <input name="role_access" type="hidden" value="0">
                                            <input class="primary_access" name="role_access" id="userAccess" type="checkbox" value="1">
                                            <span class="lever"></span> On
                                        </label>
                                    </div>
                                </div>
                                <div class="mt-4 role-check single-check">
                                    <fieldset class="form-check">
                                        <input class="form-check-input" name="role_add" type="hidden" value="0">
                                        <input class="form-check-input" name="role_add" type="checkbox" id="addRole" value="1">
                                        <label class="form-check-label" for="addRole">Add role</label>
                                    </fieldset>
                                </div>
                                <div class="mt-4 role-check single-check">
                                    <fieldset class="form-check">
                                        <input class="form-check-input" name="role_edit" type="hidden" value="0">
                                        <input class="form-check-input" name="role_edit" type="checkbox" id="modifyRole" value="1">
                                        <label class="form-check-label" for="modifyRole">Modify role</label>
                                    </fieldset>
                                </div>
                                <div class="mt-4 role-check single-check">
                                    <fieldset class="form-check">
                                        <input class="form-check-input" name="role_delete" type="hidden" value="0">
                                        <input class="form-check-input" name="role_delete" type="checkbox" id="deleteRole" value="1">
                                        <label class="form-check-label" for="deleteRole">Delete role</label>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="access_wrap d-flex">
                                <div class="switch w-25">
                                    <h6>Setting access</h6>
                                    <div class="pY-4 position-relative">
                                        <label>
                                            Off
                                            <input name="setting_access" type="hidden" value="0">
                                            <input class="primary_access" name="setting_access" id="settingAccess" type="checkbox" value="1">
                                            <span class="lever"></span> On
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <button class="btn btn-primary" type="submit">Add Role</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script !src="">
        $(document).on('change', '.primary_access', function(){

            if ($('.primary_access').is(':checked')) {
                $(this).closest('.access_wrap').addClass('active');
            }
            else{
                $(this).closest('.access_wrap').removeClass('active');
                console.log($(this).closest('.access_wrap').find('input[type=checkbox]').prop('checked', false))
            }
        })
    </script>
@endsection
