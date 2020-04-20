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
                                            <a href="javascript:void(0)" user-id="{{$row->id}}" class=" btn-danger btn-sm text-white delete_user"><i class="far fa-trash-alt"></i></a>
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

@section('script')
    <script !src="">
        $(document).on('click', '.delete_user', function (e) {
            e.preventDefault();
            let delete_id = $(this).attr('user-id');
            swal({
                    title: "Are you sure?",
                    text: "Your will not be able to recover this imaginary file!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: false
                },
                function(){
                    // $('.preloader').show();
                    swal("Deleted!", "Your imaginary file has been deleted.", "success");
                    window.location = '/user/'+delete_id+'/delete';
                });
        })
    </script>
@endsection
