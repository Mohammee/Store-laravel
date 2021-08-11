@extends('backend.layouts.master')

@section('title' , 'mohammad sultan ')

@section('css')

@endsection



@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row mb-2">
                <h1>Admins | <i class="la la-home"></i> - Moderators </h1>
            </div>

            <div class="content-body"><!-- users list start -->
                <section class="users-list-wrapper">

                    <div class="users-list-table">

                        <!--success-->
                        @if(session()->has('success_message'))
                            <div class="alert alert-success " >
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
                                                <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-center mb-2">
                                                    <a class="btn btn-block btn-primary glow"
                                                       href="{{ route('admin.moderators.create') }}">
                                                        <i class="la la-plus"></i>Add New Moderators
                                                    </a>
                                                </div>


                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <table id="users-list-datatable" class="table dataTable no-footer"
                                                           role="grid" aria-describedby="users-list-datatable_info">
                                                        <thead>
                                                        <tr role="row">
                                                            <th>ID</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Role</th>
                                                            <th>Active</th>
                                                            <th>Last Activity</th>
                                                            <th>Status</th>
                                                            <th></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        @foreach($moderators as $moderator)
                                                            <tr role="row" class="even">
                                                                <td class="sorting_1">{{ $moderator->id }}</td>
                                                                <td>
                                                                    <a href="../../../html/ltr/vertical-menu-template/page-users-view.html">{{ $moderator->name }}</a>
                                                                </td>
                                                                <td>{{ $moderator->email }}</td>
                                                                <td>{{ $moderator->role->name }}</td>
                                                                <td><span
                                                                        class="{{ $moderator->active ? 'badge badge-success' : 'badge badge-danger' }}">
                                                                        @if($moderator->active)
                                                                            Active
                                                                        @else
                                                                            NonActive
                                                                        @endif
                                                                    </span>
                                                                </td>
                                                                <td>{{ formatDate($moderator->lastActivity) }}</td>
                                                                <td>
                                                                    @if($moderator->status)
                                                                        <a  href="javascript:void(0)" style="{{ auth('admin')->id() == $moderator->id ? 'pointer-events:none;' :'' }} " moderator_id="{{ $moderator->id }}"
                                                                            status_id="1" class="updateModeratorStatus "
                                                                            id="moderator-{{ $moderator->id }}">
                                                                    <span class="badge badge-success ">
                                                                        Approved
                                                                    </span>
                                                                        </a>
                                                                    @else
                                                                        <a  href="javascript:void(0)" moderator_id="{{ $moderator->id }}"
                                                                            status_id="0" class="updateModeratorStatus"
                                                                            id="moderator-{{ $moderator->id }}">
                                                                    <span class="badge badge-danger ">
                                                                        Rejected
                                                                    </span>
                                                                        </a>
                                                                    @endif

                                                                </td>
                                                                <td>
                                                                    <a href="{{ route('admin.moderators.edit' , $moderator->id) }}">
                                                                        <i class="la la-edit"></i>
                                                                    </a>

                                                                    <!-- Delete buttom -->
                                                                    <a href="{{ route('admin.moderators.destroy' , $moderator->id) }}"
                                                                       class="red button delete-confirm" record_type="moderator" record_id="{{ $moderator->id }}">
                                                                        <i class="la la-trash"></i>
                                                                    </a>
                                                                    <form method="POST"
                                                                          action="{{ route('admin.moderators.destroy' , $moderator->id) }}"
                                                                          style="display: inline-block"
                                                                          id="moderator-delete-form-{{ $moderator->id }}">
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

                                            <div class="row">
                                                <div class="col-sm-12 col-md-5">
                                                    <div class="dataTables_info" id="users-list-datatable_info"
                                                         role="status" aria-live="polite">Showing 1 to 10 of 36 entries
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-7">
                                                    <div class="dataTables_paginate paging_simple_numbers"
                                                         id="users-list-datatable_paginate">
                                                        <ul class="pagination">
                                                            <li class="paginate_button page-item previous disabled"
                                                                id="users-list-datatable_previous"><a href="#"
                                                                                                      aria-controls="users-list-datatable"
                                                                                                      data-dt-idx="0"
                                                                                                      tabindex="0"
                                                                                                      class="page-link">Previous</a>
                                                            </li>
                                                            <li class="paginate_button page-item active"><a href="#"
                                                                                                            aria-controls="users-list-datatable"
                                                                                                            data-dt-idx="1"
                                                                                                            tabindex="0"
                                                                                                            class="page-link">1</a>
                                                            </li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                                                      aria-controls="users-list-datatable"
                                                                                                      data-dt-idx="2"
                                                                                                      tabindex="0"
                                                                                                      class="page-link">2</a>
                                                            </li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                                                      aria-controls="users-list-datatable"
                                                                                                      data-dt-idx="3"
                                                                                                      tabindex="0"
                                                                                                      class="page-link">3</a>
                                                            </li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                                                      aria-controls="users-list-datatable"
                                                                                                      data-dt-idx="4"
                                                                                                      tabindex="0"
                                                                                                      class="page-link">4</a>
                                                            </li>
                                                            <li class="paginate_button page-item next"
                                                                id="users-list-datatable_next"><a href="#"
                                                                                                  aria-controls="users-list-datatable"
                                                                                                  data-dt-idx="5"
                                                                                                  tabindex="0"
                                                                                                  class="page-link">Next</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
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
        //update modetrators status but we cannot disapprove yourself so in anuther reqeuet
        //it return you to admin/login by middleware isApprove for admin
        $('.updateModeratorStatus').click(function () {

            var moderator_id = $(this).attr('moderator_id');
            var status_id = $(this).attr('status_id');

            if(moderator_id !=  '{{ auth('admin')->id() }}')
            {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    }
                })

                $.ajax({
                    url: "{{ route('admin.update-moderator-status') }}",
                    method: "PATCH",
                    data: {status: status_id, id: moderator_id},
                    success: function (response) {
                        if (response.status) {
                            $('#moderator-' + response.moderator_id).attr('status_id' , 1);
                            $('#moderator-' + response.moderator_id).html('<span class="badge badge-success ">'+
                                'Approved' +
                                '</span>')
                        } else {
                            $('#moderator-' + response.moderator_id).attr('status_id' ,0);
                            $('#moderator-' + response.moderator_id).html('<span class="badge badge-danger ">'+
                                'Rejected' +
                                '</span>')
                        }
                    },
                    error: function (error) {
                        console.log(error)
                    },
                })
            }else{
                console.log('You con\'t do it');
            }


        })
    </script>


    <script>
       $(document).ready(function () {

           $('.delete-confirm').click(function (event) {
               event.preventDefault();

               var type = $(this).attr('record_type');
               var id = $(this).attr('record_id');

               Swal.fire({
                   title: 'Are you sure?',
                   text: 'Please click yes to confirm delete this ' + type + ' has id = ' + id + '.',
                   // icon:'warning',
                   showCancelButton:true,
                   cancelButtonColor:'#3085d6',
                   confirmButtonColor:'#d33',
                   cancelButtonText:'No , cancel!',
                   confirmButtonText:'Yes , delete it!',
                   customClass: {
                       confirmButton: 'btn btn-success',
                       cancelButton: 'btn btn-danger',
                   },
               }).then((result) => {
                   if(result.isConfirmed){
                       $('#' + type + '-delete-form-' + id).off('submit').submit();
                   }else{
                       if(result.dismiss == 'cancel'){
                           Swal.fire('Cancelled' , 'Delete Cancelled :)', 'error');
                       }else{
                           Swal.fire('Error' , 'Something Error!' , 'error')
                       }
                   }
               })
           })
       })
    </script>
@endsection
