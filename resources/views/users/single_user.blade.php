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

                </ul>
                <div class="tab-content profile_tab card pt-5" id="myTabContentMD">
                    {{-- general pane--}}
                    <div class="tab-pane fade show active" id="home-md" role="tabpanel" aria-labelledby="home-tab-md">
                        <div class="row">
                            <div class="col-md-6 pl-4">
                                {{-- TODO show user general information  --}}

                            </div>
                        </div>
                    </div>

                    {{-- profile pane--}}
                    <div class="tab-pane fade" id="profile-md" role="tabpanel" aria-labelledby="profile-tab-md">
                        <div class="row">
                            <div class="col-md-6">
                                {{-- TODO show user personal information  --}}
                            </div>
                        </div>
                    </div>

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
@endsection
