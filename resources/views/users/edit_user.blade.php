@extends('layout')
@section('content')
<div class="container-fluid">
    <div class="row position-relative ">
        <div class="col-12 m-auto">
            <ul class="nav nav-tabs md-tabs bg-primary" id="myTabMD" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab-md" data-toggle="tab" href="#home-md" role="tab" aria-controls="home-md"
                       aria-selected="true">General</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab-md" data-toggle="tab" href="#profile-md" role="tab" aria-controls="profile-md"
                       aria-selected="false">Profile</a>
                </li>
                @if(auth()->user()->id == $user->id)
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab-md" data-toggle="tab" href="#contact-md" role="tab" aria-controls="contact-md"
                       aria-selected="false">Security</a>
                </li>
                @endif

            </ul>
            <div class="tab-content profile_tab card pt-5" id="myTabContentMD">
                {{-- general pane--}}
                <div class="tab-pane fade show active" id="home-md" role="tabpanel" aria-labelledby="home-tab-md">
                   <div class="row">
                       <div class="col-md-6 pl-4">
                           <h4 class="mb-4">General settings</h4>
                           <form method="POST" action="{{ route('user.update', $user->id) }}">
                               @csrf

                               <input type="hidden" name="task" value="general_update">
                               <div class="md-form">
                                   <i class="fas fa-user prefix text-primary"></i>
                                   <input name="name" type="text" id="form6" class="form-control" placeholder="Your name" value="{{old('name') ?? $user->name}}" required>
                                   <label for="form6">Name</label>
                               </div>
                               <div class="md-form">
                                   <i class="fas fa-envelope prefix text-primary"></i>
                                   <input name="email" type="email" id="form7" class="form-control" placeholder="Your name" value="{{old('email') ?? $user->email}}" required>
                                   <label for="form7" >Email</label>
                               </div>
                               <div class="md-form">
                                   <i class="fas fa-th-large prefix text-primary"></i>
                                   <select class="mdb-select md-form initialized text-white ml-5" name="role_id" required>
                                       <option value="" selected>Role</option>
                                       @foreach($role->all() as $row)
                                           <option value="{{$row->id}}" @if($user->role && $user->role->id == $row->id) selected @endif>{{$row->name}}</option>
                                       @endforeach
                                   </select>
                               </div>

                               <div class="md-form">
                                   <i class="fas fa-user-shield prefix text-primary"></i>
                                   <select class="mdb-select md-form initialized text-white ml-5" name="status" required>
                                       <option value="" disabled selected>Status</option>
                                       <option value="0" @if($user->status == 0) selected @endif>Deactive</option>
                                       <option value="1" @if($user->status == 1) selected @endif>Active</option>
                                   </select>
                               </div>
                               <button class="btn btn-primary">Update</button>

                           </form>
                       </div>
                   </div>
                </div>

                {{-- profile pane--}}
                <div class="tab-pane fade" id="profile-md" role="tabpanel" aria-labelledby="profile-tab-md">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="mb-4">Profile settings</h4>
                            <form action="{{route('user.storeImage', $user->id)}}" method="POST">
                                @csrf
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Profile picture</span>
                                    </div>
                                    <div class="custom-file">
                                        <input name="image" type="hidden" id="crop_img">
                                        <input type="file" class="custom-file-input" id="upload_image">
                                        <label class="custom-file-label" for="upload_image">Choose image</label>
                                    </div>
                                </div>
                                <div class="sub-btn">
                                    <button type="submit" class="btn btn-primary btn-sm">Upload</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- security pane--}}
                @if(auth()->user()->id == $user->id)
                <div class="tab-pane fade" id="contact-md" role="tabpanel" aria-labelledby="contact-tab-md">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="mb-4">Security settings</h4>
                            <form method="POST" action="{{ route('user.updatePassword', $user->id) }}">
                                @csrf
                                <div class="col-md-6 mb-4">
                                    <div class="md-form">
                                        <i class="fas fa-envelope prefix text-primary"></i>
                                        <input name="old_password" type="password" id="form6" class="form-control" placeholder="Old Password" required>
                                        <label for="form6">Old Password</label>
                                    </div>
                                    <div class="md-form">
                                        <i class="fas fa-envelope prefix text-primary"></i>
                                        <input name="password" type="password" id="form6" class="form-control" placeholder="Password" required>
                                        <label for="form6">Password</label>
                                    </div>
                                    <div class="md-form">
                                        <i class="fas fa-envelope prefix text-primary"></i>
                                        <input name="password_confirmation" type="password" id="form7" class="form-control" placeholder="Confirm password" required>
                                        <label for="form7" >Confirm password</label>
                                    </div>

                                    <button class="btn btn-primary">Update</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>

        {{-- user profile card--}}
        <div class="card card-cascade narrower user_pcard">
            <!-- Card image -->
            <div class="view view-cascade overlay">
                <img class="card-img-top" src="@if($user->image) {{asset($user->image)}} @else {{asset('/uploads/default.jpg')}} @endif" alt="Card image cap">
                <a>
                    <div class="mask rgba-white-slight waves-effect waves-light"></div>
                </a>
            </div>
            <!-- Card content -->
            <div class="card-body card-body-cascade">
                <h4 class="font-weight-bold text-primary text-center mb-0">{{$user->name}}</h4>
                <span class="font-weight-bold text-light text-center text-small text-center d-block mb-0">{{$user->email}}</span>
                <div class="chip mt-2 mb-0 waves-effect waves-effect">
                    <img src="https://cdn4.iconfinder.com/data/icons/black-and-white-business/32/i8_business-512.png" alt="Contact Person"> {{$user->role->name}}
                </div>

                <div class="profile_btns">
                    <a type="button" class="btn-floating btn-small btn-fb waves-effect waves-light"><i class="fab fa-facebook-f"></i></a>
                    <a type="button" class="btn-floating btn-small btn-tw waves-effect waves-light"><i class="fab fa-twitter"></i></a>
                    <a type="button" class="btn-floating btn-small btn-dribbble waves-effect waves-light"><i class="fab fa-dribbble"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

{{--    modal--}}
<div id="uploadimageModal" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center">Upload & Crop Image</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div id="image_demo"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success crop_image">Crop image</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')
    <script>
        $(document).ready(function(){

            $image_crop = $('#image_demo').croppie({
                enableExif: true,
                viewport: {
                    width:368,
                    height:245,
                    type:'square' //circle
                },
                boundary:{
                    width:470,
                    height:350
                }
            });

            $('#upload_image').on('change', function(){
              let name = $(this).val();
              let ext = name.substring(name.lastIndexOf('.') + 1);
              let supportedFile = ['jpg', 'jpeg', 'png'];
              if(supportedFile.indexOf(ext) != -1 ){
                var reader = new FileReader();
                reader.onload = function (event) {
                    $image_crop.croppie('bind', {
                        url: event.target.result
                    }).then(function(){
                        console.log('jQuery bind complete');
                    });
                }
                reader.readAsDataURL(this.files[0]);
                $('#uploadimageModal').modal('show');
              }else{
                alert('this file is not supported');
                $(this).closest('form').trigger("reset");
              }

            });

            $('.crop_image').click(function(event){
                $image_crop.croppie('result', {
                    type: 'canvas',
                    size: 'viewport'
                }).then(function(response){
                    let data = response.split(',');
                    let img = data[1];
                    $('#crop_img').val(img);
                    console.log(img);
                    $('#uploadimageModal').modal('hide');
                })
            });

        });
    </script>
@endsection
