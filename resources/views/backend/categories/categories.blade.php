@extends('backend.layouts.master')

@section('title' , 'mohammad sultan ')

@section('css')
@endsection



@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row mb-2">
                <h1>Categories | <i class="la la-home"></i> - Categories </h1>
            </div>


            <div class="content-body"><!-- users list start -->
                <section class="users-list-wrapper">

                    <div class="users-list-filter px-1">
                        <form method="GET" action="{{ route('admin.categories.index') }}">
                            <div class="row border border-light rounded py-2 mb-2">
                                <div class="col-12 col-sm-6 col-lg-3">
                                    <label for="name"> Search:</label>
                                    <fieldset class="form-group">
                                        <input type="text" name="name" class="form-control" value="{{ request('name') }}">
                                    </fieldset>
                                </div>
                                <div class="col-12 col-sm-6 col-lg-3">
                                    <label for="users-list-role">Role</label>
                                    <fieldset class="form-group">
                                        <select class="form-control" id="users-list-role">
                                            <option value="">Any</option>
                                            <option value="User">User</option>
                                            <option value="Staff">Staff</option>
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-12 col-sm-6 col-lg-3">
                                    <label for="status">Status</label>
                                    <fieldset class="form-group">
                                        <select class="form-control" name="status" id="status">
                                            <option value="">Any</option>
                                            <option value="1" {{ request('status')  == 1 ? 'selected' : '' }} >Active</option>
                                            <option value="2"  {{ request('status') == 2 ? 'selected' : '' }}>Banned</option>
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-center">
                                    <button class="btn btn-block btn-primary glow" type="submit">Show</button>
                                </div>
                            </div>
                        </form>
                    </div>

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
                                                   href="{{ route('admin.categories.create') }}">
                                                    <i class="la la-plus"></i>Add New Category
                                                </a>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table dataTable no-footer">
                                                    <thead>
                                                    <tr role="row">
                                                        <th>ID</th>
                                                        <th style="width: 150px;">Cateogry Name</th>
                                                        <th>Parent Category Name
                                                        </th>
                                                        <th>Url</th>

                                                        <th>Product Number</th>

                                                        <th>status</th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    @forelse($categories as $category)
                                                        <tr role="row" class="even">
                                                            <td class="sorting_1">{{ $category->id }}</td>
                                                            <td>
                                                                <a href="../../../html/ltr/vertical-menu-template/page-users-view.html">
                                                                    @if($category->parent_id > 0)
                                                                        @foreach($category->level() as $level)
                                                                            @if(!$loop->last)
                                                                                {{ '-' }}
                                                                            @else
                                                                                {{ '-' . $category->name}}
                                                                            @endif
                                                                        @endforeach
                                                                    @else
                                                                        {{$category->name}}
                                                                    @endif
                                                                </a>
                                                            </td>
                                                            @if(!empty($category->parent_id > 0))
                                                                <td>
                                                                    <?php $parent_name = '';  ?>
                                                                    @foreach($category->level() as $level)
                                                                    @if(! $loop->last)
                                                                    <?php $parent_name .= $level . ' &raquo;'; ?>
                                                                    @endif
                                                                    @endforeach

                                                                   {!! trim($parent_name, "&raquo;" ) !!}
                                                                </td>
                                                            @else
                                                                <td>{{ 'Root' }}</td>
                                                            @endif
                                                            <td>{{ $category->url }}</td>
                                                            <td>{{ $category->products_count  }}</td>

                                                            <td>
                                                                @if($category->status)
                                                                    <a href="javascript:void(0)"
                                                                       category_id="{{ $category->id }}"
                                                                       status_id="1" class="updateCategoryStatus"
                                                                       id="category-{{ $category->id }}">
                                                                        <i class="la la-toggle-on " style="font-size: 36px;"></i>
                                                                    </a>
                                                                @else
                                                                    <a href="javascript:void(0)"
                                                                       category_id="{{ $category->id }}"
                                                                       status_id="0" class="updateCategoryStatus"
                                                                       id="category-{{ $category->id }}">
                                                                        <i class="la la-toggle-off " style="font-size: 36px;"></i>
                                                                    </a>
                                                                @endif

                                                            </td>
                                                            <td>
                                                                <a href="{{ route('admin.categories.edit' , $category->id) }}">
                                                                    <i class="la la-edit"></i>
                                                                </a>

                                                                <!-- Delete buttom -->
                                                                <a href="{{ route('admin.categories.destroy' , $category->id) }}"
                                                                   class="red button delete-confirm"
                                                                   record_type="category"
                                                                   record_id="{{ $category->id }}">
                                                                    {{--                                                                   onclick="--}}
                                                                    {{--                                                                       var result = confirm('Are you sure!');--}}
                                                                    {{--                                                                       event.preventDefault();--}}
                                                                    {{--                                                                       if(result)--}}
                                                                    {{--                                                                       {--}}
                                                                    {{--                                                                       document.getElementById('category-delete-form-{{ $category->id }}').submit();--}}
                                                                    {{--                                                                       }--}}
                                                                    {{--                                                                       ">--}}
                                                                    <i class="la la-trash"></i>
                                                                </a>
                                                                <form method="POST"
                                                                      action="{{ route('admin.categories.destroy' , $category->id) }}"
                                                                      style="display: inline-block"
                                                                      id="category-delete-form-{{ $category->id }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                </form>

                                                            </td>
                                                        </tr>

                                                    @empty
                                                        <tr>
                                                            <td colspan="3" class="info">No Category to display!</td>
                                                        </tr>
                                                    @endforelse


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>


                                        <!-- start pagination -->
                                        @if($categories->hasPages())
                                            <div class="row d-flex justify-content-between align-items-center">
                                                <div class="col-sm-12 col-md-5">
                                                    <div class="dataTables_info" id="users-list-datatable_info"
                                                         role="status" aria-live="polite">Showing {{ (($categories->currentPage() - 1) * $categories->perPage()) + 1 }} to
                                                        {{ (($categories->currentPage() - 1) * $categories->perPage()) + $categories->count() }} of {{ $categories->total() }} entries
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-7">
                                                    <div class="dataTables_paginate paging_simple_numbers"
                                                         id="users-list-datatable_paginate">
                                                        {{--  {{ $categories->appends(request()->input())->links('pagination::bootstrap-4') }}--}}
                                                        {{ $categories->withQueryString()->links('pagination::bootstrap-4') }}

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
            $('.updateCategoryStatus').click(function () {

                var category_id = $(this).attr('category_id');
                var status_id = $(this).attr('status_id');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })

                $.ajax({
                    url: '{{ route('admin.update-category-status') }}',
                    method: 'PATCH',
                    data: {status: status_id, id: category_id},
                    success: function (response) {
                        if (response.status) {
                            $('#category-' + response.category_id).attr('status_id', 1);
                            $('#category-' + response.category_id).html('<i class="la la-toggle-on " style="font-size: 36px;"></i>')
                        } else {
                            $('#category-' + response.category_id).attr('status_id', 0);
                            $('#category-' + response.category_id).html('<i class="la la-toggle-off " style="font-size: 36px;"></i>')
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
                        }else{
                            Swal.fire('Error' , 'Something Error!' , 'error')
                        }
                    }
                })
            })
        })
    </script>

@endsection
