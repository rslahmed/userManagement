@extends('auth.layout')
@section('content')
<section class="view intro-2">
    <div class="mask rgba-stylish-strong h-100 d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto">

                    <!-- Form with header -->
                    <div class="card wow fadeIn" data-wow-delay="0.3s">
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                            @csrf
                                <!-- Header -->
                                <div class="form-header purple-gradient">
                                    <h3 class="font-weight-500 my-2 py-1"><i class="fas fa-user"></i> Log in:</h3>
                                </div>


                                <div class="md-form">
                                    <i class="fas fa-envelope prefix white-text"></i>
                                    <input name="email" type="text" id="orangeForm-email" class="form-control" placeholder="Your email">
                                </div>

                                <div class="md-form">
                                    <i class="fas fa-lock prefix white-text"></i>
                                    <input name="password" type="password" id="orangeForm-pass" class="form-control" placeholder="Your password">
                                </div>

                                <div class="text-center">
                                    <button class="btn purple-gradient btn-lg">Log In</button>
                                    <hr class="mt-4">
                                    <div class="inline-ul text-center d-flex justify-content-center">
                                        <a class="p-2 m-2 fa-lg tw-ic"><i class="fab fa-twitter white-text"></i></a>
                                        <a class="p-2 m-2 fa-lg li-ic"><i class="fab fa-linkedin-in white-text"> </i></a>
                                        <a class="p-2 m-2 fa-lg ins-ic"><i class="fab fa-instagram white-text"> </i></a>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <!-- Form with header -->

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
