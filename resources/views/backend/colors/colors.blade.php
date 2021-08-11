@extends('backend.layouts.master')

@section('title' , 'colors')


@section('extra-css')
@endsection

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row mb-2">
                <h1>Colors | <i class="la la-home"></i> - Colors </h1>
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
                    <div class="px-15px px-lg-25px">

                        <div class="row">
                            <div class="col-md-7">
                                <div class="card">
                                    <form id="sort_colors" action="" method="GET">
                                        <div class="card-header" style="display:flex; justify-content: space-between;">
                                            <h5 class="mb-0 h6">Colors</h5>
                                            <div class="col-md-5">
                                                <div class="form-group mb-0">
                                                    <input type="text" class="form-control form-control-sm" id="search"
                                                           name="search" value="{{ request('search') }}"
                                                           placeholder="Type color name &amp; Enter">
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <div class="card-body">
                                        <table class="table aiz-table mb-0 footable footable-1 breakpoint-lg" style="">
                                            <thead>
                                            <tr class="footable-header">
                                                <th style="display: table-cell;">#</th>
                                                <th style="display: table-cell;">Name</th>
                                                <th class="text-right" style="display: table-cell;">Options</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($colors as $color)
                                                <tr>

                                                    <td class="footable-first-visible" style="display: table-cell;">{{ $color->id }}</td>
                                                    <td style="display: table-cell;">{{ $color->name }}</td>
                                                    <td class="text-right footable-last-visible" style="display: table-cell;">
                                                        <a href="{{ route('admin.colors.edit' , $color->id) }}">
                                                            <i class="la la-edit"></i>
                                                        </a>

                                                        <!-- Delete buttom -->
                                                        <a href="{{ route('admin.colors.destroy' , $color->id) }}"
                                                           class="red button delete-confirm"
                                                           record_type="color"
                                                           record_id="{{ $color->id }}">
                                                            <i class="la la-trash"></i>
                                                        </a>
                                                        <form method="POST"
                                                              action="{{ route('admin.colors.destroy' , $color->id) }}"
                                                              style="display: inline-block"
                                                              id="color-delete-form-{{ $color->id }}">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>

                                                    </td>
                                                </tr>
                                            @empty
                                            <tr class="footable-empty">
                                                <td colspan="3">Nothing Found</td>
                                            </tr>
                                            @endforelse
                                            </tbody>
                                        </table>
                                        <div class="aiz-pagination">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0 h6">Add New Color</h5>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('admin.colors.store') }}"
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
                                            <div class="form-group mb-3">
                                                <label for="name">Color Code</label>
                                                <input type="text" placeholder="Color Code" id="code" name="code"
                                                       class="form-control" value="" required="">
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
