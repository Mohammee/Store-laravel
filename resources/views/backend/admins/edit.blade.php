@extends('backend.layouts.master')

@section('title' , 'mohammad sultan ')

@section('css')
@endsection



@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row mb-2">
                <h1>Admins | <i class="la la-home"></i> - Edit {{ $admin->name }} </h1>
            </div>

            <div class="row">
                <div class="col-md-8">

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

                    <div class="card-body">
                        <form class="form form-horizontal row-separator" method="POST"
                              action="{{ route('admin.moderators.update' , $admin->id) }}"
                              enctype="multipart/form-data">

                            @csrf
                            @method('PATCH')
                            <div class="form-body">
                                <h4 class="form-section"><i class="la la-user"></i> Admin Info</h4>

                                <div class="form-group row mx-auto">
                                    <label class="col-md-3 label-control" for="role_id">Admin Role</label>
                                    <div class="col-md-9">
                                        <select name="role_id" id="role_id" class="form-control">
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id }}" {{ $role->id == $admin->role_id ? 'selected' : '' }}>
                                                    {{ $role->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group row mx-auto">
                                    <label class="col-md-3 label-control" for="name">Name</label>
                                    <div class="col-md-9">
                                        <input type="text" id="name" class="form-control"
                                               value="{{ old('name' , $admin->name) }}" name="name" required>
                                    </div>
                                </div>


                                <div class="form-group row mx-auto">
                                    <label class="col-md-3 label-control" for="email">Admin E-mail</label>
                                    <div class="col-md-9">
                                        <input type="email" id="email" class="form-control"
                                               value="{{ old('email' , $admin->email) }}"
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

                                <div class="form-group row mx-auto last">
                                    <label class="col-md-3 label-control" for="status">Approve</label>
                                    <div class="col-md-9">
                                        <input type="checkbox" name="status"
                                               {{ $admin->status ? 'checked' : '' }} class="switch">
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
                                    <button type="reset" class="btn btn-warning mr-1">
                                        <i class="la la-remove"></i> Cancel
                                    </button>
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

    {{--   --}}

@endsection
