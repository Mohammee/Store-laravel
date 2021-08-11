@extends('backend.layouts.master')

@section('title' , 'mohammad sultan ')

@section('extra-css')
@endsection



@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row mb-2">
                <h1>Admins | <i class="la la-home"></i> - Edit Profile </h1>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="card-body">

                        <!--success-->
                        @if(session()->has('success_message'))
                            <div class="alert alert-success">
                                {{ session()->get('success_message') }}
                            </div>
                        @endif
                    <!--end success-->

                        <!-- errors -->
                        @if($errors->any())
                            <div class="row mr-2 ml-2">
                                <ul class="btn btn-lg btn-block btn-outline-danger mb-2">
                                    @foreach($errors->all() as $error)
                                        <li>
                                            {{ $error }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                    @endif
                    <!-- end errors-->


                        <form class="form form-horizontal row-separator" method="POST"
                              action="{{ route('admin.admins.profile') }}" enctype="multipart/form-data">

                            @csrf
                            @method('PATCH')
                            <div class="form-body">
                                <h4 class="form-section"><i class="la la-user"></i> Admin Info</h4>
                                <div class="form-group row mx-auto">
                                    <label class="col-md-3 label-control" for="name">Name</label>
                                    <div class="col-md-9">
                                        <input type="text" id="name" class="form-control"
                                               value="{{ old('name' , $admin->name) }}" name="name" required>
                                    </div>
                                </div>

                                <div class="form-group row mx-auto">
                                    <label class="col-md-3 label-control" for="type">Admin Role</label>
                                    <div class="col-md-9">
                                        <input type="text" id="type" class="form-control" value="{{ $admin->role->name }}"
                                               readonly=""
                                               name="type">
                                    </div>
                                </div>


                                <div class="form-group row mx-auto">
                                    <label class="col-md-3 label-control" for="email">Admin E-mail</label>
                                    <div class="col-md-9">
                                        <input type="text" id="email" class="form-control" value="{{ old('email' , $admin->email) }}"
                                               name="email" required>
                                    </div>
                                </div>

                                <div class="form-group row mx-auto last">
                                    <label class="col-md-3 label-control" for="mobile">Contact Number</label>
                                    <div class="col-md-9">
                                        <input type="text" id="mobile" class="form-control"
                                               value="{{ old('mobile' , $admin->mobile)  }}"
                                               name="mobile" required>
                                    </div>
                                </div>

                                <div class="form-group row mx-auto ">
                                    <label for="avatar" class="col-md-3 label-control">Select File</label>
                                    <div class="col-md-9">
                                        <div class="form-control">
                                            <input type="file" name="avatar" id="avatar" >
                                            @if(! empty($admin->avatar))
                                                <a href="{{ url($admin->avatar) }}" target="_blank" class="success">
                                                  Show Avatar
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mx-auto">
                                    <label class="col-md-3 label-control" for="password">Current Password</label>
                                    <div class="col-md-9">
                                        <input type="password" id="password" class="form-control"
                                               placeholder="Current Password" name="password">
                                        <span class="mt-1" id="checkPwd"></span>

                                    </div>
                                </div>

                                <div class="form-group row mx-auto">
                                    <label class="col-md-3 label-control" for="new_password">New Password</label>
                                    <div class="col-md-9">
                                        <input type="password" id="new_password" class="form-control"
                                               placeholder="New Password" name="new_password">
                                    </div>
                                </div>

                                <div class="form-group row mx-auto">
                                    <label class="col-md-3 label-control" for="new_password_confirmation">Confirm
                                        Password</label>
                                    <div class="col-md-9">
                                        <input type="password" id="new_password_confirmation" class="form-control"
                                               placeholder="Confirm Password" name="new_password_confirmation">
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <a href="{{ route('admin.dashboard') }}" class="btn btn-warning mr-1">
                                        <i class="la la-remove"></i> Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="la la-check"></i> Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection

@section('extra-js')
    <script>

        $(document).ready(function () {

            $('#password').keyup(function (e) {
                var current_pwd = $('#password').val();

                if (current_pwd != '') {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    $.ajax({
                        url: '{{ route('admin.check-current-pwd') }}',
                        method: 'GET',
                        data: {current_pwd: current_pwd},
                        success: function (response) {
                            success = response.success;
                            message = '';
                            if (!success) {
                                message = '<font class="danger" > Current Password is incorrect! </font>';
                            } else if (success) {
                                message = '<font class="success" > Current Password is correct! </font>';
                            }
                            $('#checkPwd').html(message);
                        },
                        error: function (error) {
                            alert(error)
                        }
                    })
                } else {
                    $('#checkPwd').html("");
                }

            })
        });
    </script>

@endsection
