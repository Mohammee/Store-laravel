@extends('backend.layouts.master')

@section('title' , 'attributes')


@section('extra-css')
@endsection

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row mb-2">
                <h1>Attributes | <i class="la la-home"></i> - Attributes </h1>
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

                    <div class="aiz-main-content">
                        <div class="px-15px px-lg-25px">

                            <div class="row">
                                <div class="col-md-7">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0 h6">Attributes</h5>
                                        </div>
                                        <div class="card-body">
                                            <table class="table aiz-table mb-0 footable footable-1 breakpoint-lg"
                                                   style="">
                                                <thead>
                                                <tr class="footable-header">


                                                    <th class="footable-first-visible" style="display: table-cell;">#
                                                    </th>
                                                    <th style="display: table-cell;">Name</th>
                                                    <th style="display: table-cell;">Values</th>
                                                    <th class="text-right footable-last-visible"
                                                        style="display: table-cell;">Options
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                @foreach($attributes as $attribute)
                                                    <tr>
                                                        <td class="footable-first-visible"
                                                            style="display: table-cell;">{{ $attribute->id }}
                                                        </td>
                                                        <td style="display: table-cell;">{{ $attribute->name }}</td>
                                                        <td style="display: table-cell;">
                                                            @foreach($attribute->optionValues as $value)
                                                                <span style="margin: 2px"
                                                                    class="badge badge-secondary badge-md bg-soft-dark">{{ $value->name }}</span>
                                                            @endforeach

                                                        </td>
                                                        <td class="text-right footable-last-visible"
                                                            style="display: table-cell;">
                                                            <a class="btn btn-soft-info btn-icon btn-circle btn-sm"
                                                               href="{{ route('admin.attributes.show' , $attribute->id) }}"
                                                               title="Attribute values">
                                                                <i class="ft-settings icon-left"></i>
                                                            </a>

                                                            <a href="{{ route('admin.attributes.edit' , $attribute->id) }}">
                                                                <i class="la la-edit"></i>
                                                            </a>

                                                            <!-- Delete buttom -->
                                                            <a href="{{ route('admin.attributes.destroy' , $attribute->id) }}"
                                                               class="red button delete-confirm"
                                                               record_type="attribute"
                                                               record_id="{{ $attribute->id }}">
                                                                <i class="la la-trash"></i>
                                                            </a>
                                                            <form method="POST"
                                                                  action="{{ route('admin.attributes.destroy' , $attribute->id) }}"
                                                                  style="display: inline-block"
                                                                  id="attribute-delete-form-{{ $attribute->id }}">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>

                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0 h6">Add New Attribute</h5>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ route('admin.attributes.store') }}"
                                                  method="POST">
                                                @csrf
                                                <div class="form-group mb-3">
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
                                                        >
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
                                                        >
                                                    </div>

                                                </div>
                                                <div class="form-group mb-3 text-right">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>

                </section>
            </div>
        </div>
    </div>
@endsection

@section('extra-js')
    <script>

        $(document).on('click' , '.delete-confirm' , function (e) {
         e.preventDefault();

            var type = $(this).attr('record_type');
            var id = $(this).attr('record_id');

            Swal.fire({
                title: 'Are you sure?',
                text: 'Please click yes to confirm delete this ' + type + ' has id = ' + id + '.',
                // icon:'warning',
                showCancelButton: true,
                cancelButtonColor: '#3085d6',
                confirmButtonColor: '#d33',
                cancelButtonText: 'No , cancel!',
                confirmButtonText: 'Yes , delete it!',
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger',
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#' + type + '-delete-form-' + id).off('submit').submit();
                } else {
                    if (result.dismiss == 'cancel') {
                        Swal.fire('Cancelled', 'Delete Cancelled :)', 'error');
                    } else {
                        Swal.fire('Error', 'Something Error!', 'error')
                    }
                }
            })
        })

    </script>
@endsection
