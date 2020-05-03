@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4 m-auto">
                <div class="card">
                    <div class="card-header">Send email</div>
                    <div class="card-body">
                        <form action="{{url('/sendmail')}}" method="post">
                            @csrf
                            <input type="text" class="form-control" name="name" placeholder="Email Name">
                            <input type="email" class="form-control" name="email" placeholder="Email address">
                            <input type="text" class="form-control" name="message" placeholder="Email Message">
                            <button type="submit" class="mt-2 btn btn-sm btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
