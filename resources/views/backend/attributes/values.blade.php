@extends('backend.layouts.master')

@section('title' , 'attributes')


@section('extra-css')
@endsection

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row mb-2">
                <h1>Attributes | <i class="la la-home"></i> - Attribute Values </h1>
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

                    <div class="row">
                        <!-- Small table -->
                        <div class="col-md-7">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">
                                        Size
                                    </strong>
                                </div>

                                <div class="card-body">
                                    <table class="table aiz-table mb-0 footable footable-1 breakpoint-lg" style="">
                                        <thead>
                                        <tr class="footable-header">


                                            <th class="footable-first-visible" style="display: table-cell;">#</th>
                                            <th style="display: table-cell;">Value</th>
                                            <th class="text-right footable-last-visible" style="display: table-cell;">
                                                Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @forelse($attribute->optionValues as $value)
                                            <tr>


                                                <td class="footable-first-visible" style="display: table-cell;">{{ $value->id }}</td>
                                                <td style="display: table-cell;">
                                                   {{ $value->name }}
                                                </td>
                                                <td class="text-right footable-last-visible"
                                                    style="display: table-cell;">
                                                    <a href="{{ route('admin.edit-attribute-value' , $value->id) }}">
                                                        <i class="la la-edit"></i>
                                                    </a>

                                                    <!-- Delete buttom -->
                                                    <a href="{{ route('admin.delete-attribute-value' , $value->id) }}"
                                                       class="red button delete-confirm"
                                                       record_type="value"
                                                       record_id="{{ $value->id }}">
                                                        <i class="la la-trash"></i>
                                                    </a>
                                                    <form method="POST"
                                                          action="{{ route('admin.delete-attribute-value' , $value->id) }}"
                                                          style="display: inline-block"
                                                          id="value-delete-form-{{ $value->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>

                                        @empty
                                            <tr>
                                                <td colspan="3" class="mx-auto">
                                                    No vales
                                                </td>
                                            </tr>
                                        @endforelse

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0 h6">Add New Attribute Value</h5>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('admin.store-attribute-values') }}"
                                          method="POST">
                                        @csrf

                                        <div class="form-group mb-3">
                                            <label for="name">Attribute Name</label>
                                            <input type="hidden" name="attribute_id" value="{{ $attribute->id }}">
                                            <input type="text" placeholder="Name" name="attribute_name" value="{{ $attribute->name }}"
                                                   class="form-control" readonly="">
                                        </div>
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
                                                    value="{{ old('name.1') }}" >
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
                                                    value="{{ old('name.2') }}" >
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

                </section>
            </div>
        </div>
    </div>
@endsection

@section('extra-js')
    <script>

        $(document).on('click', '.delete-confirm', function (e) {
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

