@extends('backend.layouts.master')

@section('title' , 'mohammad sultan ')

@section('css')
    <style>
        #inlist {
            overflow: hidden;
            word-wrap: normal;
        }
    </style>
@endsection



@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row mb-2">
                <h1>Admins | <i class="la la-home"></i> - Prodcuts </h1>
            </div>

            <div class="content-body"><!-- users list start -->
                <section class="users-list-wrapper">

                    <div class="users-list-table">

                        <!--success-->
                        @if(session()->has('success_message'))
                            <div class="alert alert-success ">
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

                                                <!-- Add new Moderator -->
                                                <div class="col-12 col-sm-3 col-lg-3  mb-2">
                                                    <a class="btn btn-block btn-primary glow"
                                                       href="{{ route('admin.products.create') }}">
                                                        <i class="la la-plus"></i>Add New Product
                                                    </a>
                                                </div>


                                            </div>
                                            {{--                                            <div class="row">--}}
                                            <div class="col-sm-12">
                                                <table id="users-list-datatable" class="table dataTable no-footer"
                                                       role="grid" aria-describedby="users-list-datatable_info">
                                                    <thead>
                                                    <tr role="row">
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Main Image</th>
                                                        <th>Price</th>
                                                        <th>Quantity</th>
                                                        <th>Categories</th>
                                                        <th>status</th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    @foreach($products as $product)
                                                        <tr role="row" class="even">
                                                            <td>{{ $product->id }}</td>
                                                            <td>{{ $product->name }}</td>
                                                            <td>
                                                                @if($product->main_image)
                                                                <img style="max-width: 80px;"
                                                                     src="{{ url($product->main_image)  }}"
                                                                     alt="image">
                                                                @endif
                                                            </td>
                                                            <td>

                                                            </td>
                                                            <td class="font-weight-bold">{{ $product->quantity }}</td>
                                                            <td>
                                                                @foreach($product->categories as $category)
                                                                    <span style="margin: 2px"
                                                                          class="badge badge-warning black"> {{ $category->name }}</span>
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                @if($product->status)
                                                                    <a href="javascript:void(0)" status="1"
                                                                       product_id="{{ $product->id }}"
                                                                       class="updateProductStatus"
                                                                       id="product-{{ $product->id }}">
                                                                        <i class="la la-toggle-on " style="font-size: 36px;"></i>
                                                                    </a>
                                                                @else
                                                                    <a href="javascript:void(0)" status="0"
                                                                       product_id="{{ $product->id }}"
                                                                       class="updateProductStatus"
                                                                       id="product-{{ $product->id }}">
                                                                        <i class="la la-toggle-off " style="font-size: 36px;"></i>
                                                                    </a>
                                                                @endif
                                                            </td>

                                                            <td>
                                                                <a href="{{ route('admin.products.edit' , $product->id) }}">
                                                                    <i class="la la-edit"></i>
                                                                </a>

                                                                <a href="{{ route('admin.products.destroy' , $product->id) }}"
                                                                   class="red delete-confirm"
                                                                   record_id="{{ $product->id }}"
                                                                   record_type="product">
                                                                    <i class="la la-trash"></i>
                                                                </a>

                                                                <form
                                                                    action="{{ route('admin.products.destroy' , $product->id) }}"
                                                                    style="display: inline-block"
                                                                    id="product-delete-form-{{ $product->id }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                </form>
                                                            </td>
                                                        </tr>

                                                    @endforeach


                                                    </tbody>
                                                </table>
                                                {{--                                                </div>--}}
                                            </div>

                                            <!-- start pagination -->
                                            @if($products->hasPages())
                                                <div class="row d-flex justify-content-between align-items-center">
                                                    <div class="col-sm-12 col-md-5">
                                                        <div class="dataTables_info" id="users-list-datatable_info"
                                                             role="status" aria-live="polite">
                                                            Showing {{ ($products->currentPage() - 1 ) * $products->perPage() + 1 }}
                                                            to {{ (($products->currentPage() - 1 ) * $products->perPage()) + $products->count() }} of {{ $products->total() }}
                                                            entries
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-7">
                                                        <div class="dataTables_paginate paging_simple_numbers"
                                                             id="users-list-datatable_paginate">
                                                            {{--  {{ $products->appends(request()->input())->links('pagination::bootstrap-4') }}--}}
                                                            {{ $products->withQueryString()->links('pagination::bootstrap-4') }}

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
                    </div>
                </section>
                <!-- users list ends -->
            </div>

        </div>
    </div>


@endsection

@section('extra-js')

    <script>

        $(document).ready(function () {

            $('.updateProductStatus').click(function (event) {
                const product_id = $(this).attr('product_id')
                const status = $(this).attr('status');

                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    }
                })


                $.ajax({
                    url: '{{ route('admin.update-product-status') }}',
                    method: 'PATCH',
                    data: {
                        id: product_id,
                        status: status
                    },
                    success: function (response) {
                        if (response.status) {
                            $('#product-' + response.product_id).attr('status', '1');
                            $('#product-' + response.product_id).html(
                                '<i class="la la-toggle-on " style="font-size: 36px;"></i>'
                            );

                        } else {
                            $('#product-' + response.product_id).attr('status', '0');
                            $('#product-' + response.product_id).html(
                                '<i class="la la-toggle-off " style="font-size: 36px;"></i>'
                            );

                        }
                    },
                    error: function (error) {

                    }
                })
            })
        })

    </script>


    <script>
        $(document).ready(function () {

            $('.delete-confirm').click(function (event) {
                event.preventDefault();

                const type = $(this).attr('record_type');
                const id = $(this).attr('record_id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'Please click yes to confirm delete this ' + type + ' has id = ' + id + '.',
                    // icon: 'warning',
                    showCancelButton: true,
                    cancelButtonColor: '#3085d6',
                    confirmButtonColor: '#d33',
                    cancelButtonText: 'No , cancel!',
                    confirmButtonText: 'Yes , delete it!',
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    }
                }).then(function (result) {
                    if (result.value) {
                        $('#' + type + '-delete-form-' + id).off('submit').submit();
                    } else {
                        if (result.dismiss == 'cancel') {
                            Swal.fire('Cancelled', 'Delete Canceled', 'error')
                        } else {
                            Swal.fire('Error', 'Something Error!', 'error')
                        }
                    }
                })
            })
        })
    </script>
@endsection
