@extends('backend.layouts.master')

@section('title' , 'attributes')


@section('extra-css')
@endsection

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row mb-2">
                <h1>Attributes | <i class="la la-home"></i> - Edit Attribute </h1>
            </div>


            <div class="content-body"><!-- users list start -->
                <section class="users-list-wrapper">


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
                    <div class="col-lg-8 mx-auto">
                        <div class="card">
                            <div class="card-body p-0">
                                <form class="p-4" action="{{ route('admin.attributes.update' , $attribute->id) }}"
                                      method="POST">
                                    @csrf
                                    @method('PATCH')

                                    <div class="form-group row">
                                        <div
                                            class="input-group">
                                                <span class="input-group-addon">
                                                      <i class="flag-icon flag-icon-gb"></i>
                                                </span>
                                            <input
                                                type="text"
                                                name="name[1]"
                                                placeholder="اسم الخيار (English)"
                                                class="form-control"
                                                value="{{ old('name.1' , $attribute->name(1)) }}" >
                                        </div>
                                        <div
                                            class="input-group">
                                                <span class="input-group-addon">
                                                      <i class="flag-icon flag-icon-ps"></i>
                                                </span>
                                            <input
                                                type="text"
                                                name="name[2]"
                                                placeholder="اسم الخيار (العربية)"
                                                class="form-control"
                                            value="{{ old('name.2' , $attribute->name(2)) }}" >
                                        </div>

                                    </div>
                                    <div class="form-group mb-0 text-right">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

@endsection

@section('extra-js')
@endsection
