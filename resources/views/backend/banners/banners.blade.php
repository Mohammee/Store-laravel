@extends('backend.layouts.master')

@section('title' , 'mohammad sultan ')

@section('css')
@endsection



@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row mb-2">
                <h1>Banners | <i class="la la-home"></i> - Banners </h1>
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

                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <!-- datatable start -->
                                <div class="table-responsive">
                                    <div id="users-list-datatable_wrapper"
                                         class="dataTables_wrapper dt-bootstrap4 no-footer">
                                        <div class="row">

                                            <!-- Add new Category -->
                                            <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-center mb-2">
                                                <a class="btn btn-block btn-primary glow"
                                                   href="{{ route('admin.banners.create') }}">
                                                    <i class="la la-plus"></i>Add New Banner
                                                </a>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table dataTable no-footer">
                                                    <thead>
                                                    <tr role="row">
                                                        <th>ID</th>
                                                        <th style="width: 150px;">Banner Title</th>
                                                        <th>Banner Image</th>
                                                        <th>Banner Background</th>
                                                        <th>status</th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    @forelse($banners as $banner)
                                                        <tr role="row" class="even">

                                                            <td class="sorting_1">{{ $banner->id }}</td>
                                                            <td>{{ $banner->name }}</td>
                                                            <td>
                                                                @if(! empty($banner->image) && file_exists($banner->image) )
                                                                    <img style="max-width: 80px; object-fit: cover"
                                                                         src="{{ url($banner->image)  }}"
                                                                         alt="image">
                                                                @endif
                                                            </td>

                                                            <td>
                                                                @if(! empty($banner->background) && file_exists($banner->background) )
                                                                    <img style="max-width: 80px; object-fit: cover"
                                                                         src="{{ url($banner->background)  }}"
                                                                         alt="image">
                                                                @endif
                                                            </td>

                                                            <td>
                                                                @if($banner->status)
                                                                    <a href="javascript:void(0)"
                                                                       banner_id="{{ $banner->id }}"
                                                                       status_id="1" class="updateBrandStatus"
                                                                       id="banner-{{ $banner->id }}">
                                                                        <i class="la la-toggle-on "
                                                                           style="font-size: 36px;"></i>
                                                                    </a>
                                                                @else
                                                                    <a href="javascript:void(0)"
                                                                       banner_id="{{ $banner->id }}"
                                                                       status_id="0" class="updateBrandStatus"
                                                                       id="banner-{{ $banner->id }}">
                                                                        <i class="la la-toggle-off "
                                                                           style="font-size: 36px"></i>
                                                                    </a>
                                                                @endif

                                                            </td>
                                                            <td>
                                                                <a href="{{ route('admin.banners.edit' , $banner->id) }}">
                                                                    <i class="la la-edit"></i>
                                                                </a>

                                                                <!-- Delete buttom -->
                                                                <a href="{{ route('admin.banners.destroy' , $banner->id) }}"
                                                                   class="red button delete-confirm"
                                                                   record_type="banner"
                                                                   record_id="{{ $banner->id }}">
                                                                    <i class="la la-trash"></i>
                                                                </a>
                                                                <form method="POST"
                                                                      action="{{ route('admin.banners.destroy' , $banner->id) }}"
                                                                      style="display: inline-block"
                                                                      id="banner-delete-form-{{ $banner->id }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                </form>

                                                            </td>
                                                        </tr>

                                                    @empty
                                                        <tr>
                                                            <td colspan="3" class="info">No Brands to display!</td>
                                                        </tr>
                                                    @endforelse


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>


                                        <!-- start pagination -->
                                        @if($banners->hasPages())
                                            <div class="row d-flex justify-content-between align-items-center">
                                                <div class="col-sm-12 col-md-5">
                                                    <div class="dataTables_info" id="users-list-datatable_info"
                                                         role="status" aria-live="polite">
                                                        Showing {{ (($banners->currentPage() - 1) * $banners->perPage()) + 1 }}
                                                        to
                                                        {{ (($banners->currentPage() - 1) * $banners->perPage()) + $banners->count() }}
                                                        of {{ $banners->total() }} entries
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-7">
                                                    <div class="dataTables_paginate paging_simple_numbers"
                                                         id="users-list-datatable_paginate">
                                                        {{--  {{ $banners->appends(request()->input())->links('pagination::bootstrap-4') }}--}}
                                                        {{ $banners->withQueryString()->links('pagination::bootstrap-4') }}

                                                    </div>
                                                </div>
                                            </div><!-- end paginations -->
                                        @endif


                                    </div>
                                </div>
                                <!-- datatable ends -->
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
        $(document).ready(function () {

            //update categoyr status
            $('.updateBrandStatus').click(function () {

                var banner_id = $(this).attr('banner_id');
                var status_id = $(this).attr('status_id');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })

                $.ajax({
                    url: '{{ route('admin.update-banner-status') }}',
                    method: 'PATCH',
                    data: {status: status_id, id: banner_id},
                    success: function (response) {
                        if (response.status) {
                            $('#banner-' + response.banner_id).attr('status_id', 1);
                            $('#banner-' + response.banner_id).html('<i class="la la-toggle-on " style="font-size: 36px;"></i>')
                        } else {
                            $('#banner-' + response.banner_id).attr('status_id', 0);
                            $('#banner-' + response.banner_id).html('<i class="la la-toggle-off " style="font-size: 36px;"></i>')
                        }
                    },
                    error: function (error) {
                        console.log(error)
                    }
                })

            })


            $('.delete-confirm').click(function (event) {
                event.preventDefault();

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
        })
    </script>

@endsection
