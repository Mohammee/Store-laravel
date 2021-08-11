@extends('backend.layouts.master')

@section('title' , 'mohammad sultan ')

@section('css')

@endsection



@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row mb-2">
                <h1>Categories | <i class="la la-home"></i>
                    @if(! $category->exists)
                        Add
                    @else
                        Edit
                    @endif
                    - Categories
                </h1>
            </div>


            <div class="card">
                <div class="card-content">
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

                    @if($category->exists)
                        <form method="POST" action="{{ route('admin.categories.update' , $category->id ) }}"
                              enctype="multipart/form-data">
                            @method('PATCH')
                            @else
                                <form method="POST" action="{{ route('admin.categories.store') }}"
                                      enctype="multipart/form-data">

                                    @endif
                                    @csrf
                                    <ul class="nav nav-tabs mb-2" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center active" id="english-tab"
                                               data-toggle="tab"
                                               href="#english" aria-controls="english" role="tab" aria-selected="true">
                                                <i class="flag-icon flag-icon-gb"></i><span class="d-none d-sm-block">English</span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center" id="english-more-info-tab"
                                               data-toggle="tab"
                                               href="#english-more-info" aria-controls="english-more-info" role="tab"
                                               aria-selected="false">
                                                <i class="flag-icon flag-icon-gb"></i><span class="d-none d-sm-block">More Info in English</span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center" id="arabic-tab"
                                               data-toggle="tab"
                                               href="#arabic" aria-controls="arabic" role="tab" aria-selected="false">
                                                <i class="flag-icon flag-icon-ps"></i><span
                                                    class="d-none d-sm-block">Arabic</span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center" id="arabic-more-info-tab"
                                               data-toggle="tab"
                                               href="#arabic-more-info" aria-controls="arabic-more-info" role="tab"
                                               aria-selected="false">
                                                <i class="flag-icon flag-icon-ps"></i><span class="d-none d-sm-block">More Info in Arabic</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="english" aria-labelledby="english-tab"
                                             role="tabpanel">
                                            <!-- Category edit english form start -->

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group row mx-auto">
                                                        <label class="col-2 label-control" for="name[1]">Category
                                                            Name</label>
                                                        <div class="col-10">
                                                            <input type="text" id="name[1]" class="form-control"
                                                                   value="{{ old('name.1' , $category->name(1)) }}"
                                                                   name="name[1]">
                                                        </div>
                                                    </div>


                                                    <div class="form-group row mx-auto">
                                                        <label class="col-2 label-control" for="url[1]">url</label>
                                                        <div class="col-10">
                                                            <input type="text" id="url[1]" class="form-control"
                                                                   name="url[1]"
                                                                   value="{{ old('url.1', $category->url(1)) }}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mx-auto last">
                                                        <label class="col-2 label-control" for="description[1]">Description</label>
                                                        <div class="col-10">
                                            <textarea name="description[1]" id="description[1]"
                                                      class="form-control summernote">{{ old('description.1' , $category->description(1)) }}</textarea>
                                                        </div>
                                                    </div>


                                                </div>

                                            </div>

                                            <!-- Category edit english form ends -->
                                        </div>
                                        <div class="tab-pane " id="english-more-info"
                                             aria-labelledby="english-more-info-tab"
                                             role="tabpanel">
                                            <!-- Category edit english form start -->

                                            <div class="row">
                                                <div class="col-12">

                                                    <div class="form-group row mx-auto last">
                                                        <label class="col-2 label-control" for="meta_title[1]">Meta
                                                            Title</label>
                                                        <div class="col-10">
                                            <input name="meta_title[1]" id="meta_title[1]"
                                                      class="form-control" value="{{ old('meta_title.1' , $category->meta_title(1)) }}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mx-auto last">
                                                        <label class="col-2 label-control" for="meta_description[1]">Meta
                                                            Description</label>
                                                        <div class="col-10">
                                            <textarea name="meta_description[1]" id="meta_description[1]" rows="5"
                                                      class="form-control">{{ old('meta_description.1' , $category->meta_description(1)) }}</textarea>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mx-auto last">
                                                        <label class="col-2 label-control" for="meta_keywords[1]">Meta
                                                            KeyWords</label>
                                                        <div class="col-10">
                                            <textarea name="meta_keywords[1]" id="meta_keywords[1]"
                                                      class="form-control">{{ old('meta_keywords.1' , $category->meta_keywords(1)) }}</textarea>
                                                        </div>
                                                    </div>


                                                </div>

                                            </div>

                                            <!-- Category edit english form ends -->
                                        </div>
                                        <div class="tab-pane" id="arabic" aria-labelledby="arabic-tab" role="tabpanel">
                                            <!-- Category edit arabic form start -->

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group row mx-auto">
                                                        <label class="col-2 label-control" for="name[2]">Category
                                                            Name</label>
                                                        <div class="col-10">
                                                            <input type="text" id="name[2]" class="form-control"
                                                                   value="{{ old('name.2' , $category->name(2)) }}"
                                                                   name="name[2]">
                                                        </div>
                                                    </div>


                                                    <div class="form-group row mx-auto">
                                                        <label class="col-2 label-control" for="url[2]">url</label>
                                                        <div class="col-10">
                                                            <input type="text" id="url[2]" class="form-control"
                                                                   name="url[2]"
                                                                   value="{{ old('url.2' , $category->url(2)) }}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mx-auto last">
                                                        <label class="col-2 label-control" for="description[2]">Description</label>
                                                        <div class="col-10">
                                            <textarea name="description[2]" id="description[2]"
                                                      class="form-control  summernote">{{ old('description.2' , $category->description(2)) }}</textarea>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>

                                            <!-- Category edit arabic form ends -->
                                        </div>
                                        <div class="tab-pane " id="arabic-more-info"
                                             aria-labelledby="arabic-more-info-tab"
                                             role="tabpanel">
                                            <!-- Category edit english form start -->

                                            <div class="row">
                                                <div class="col-12">

                                                    <div class="form-group row mx-auto last">
                                                        <label class="col-2 label-control" for="meta_title[2]">Meta
                                                            Title</label>
                                                        <div class="col-10">
                                            <input name="meta_title[2]" id="meta_title[2]"
                                                      class="form-control" value="{{ old('meta_title.2' , $category->meta_title(2)) }}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mx-auto last">
                                                        <label class="col-2 label-control" for="meta_description[2]">Meta
                                                            Description</label>
                                                        <div class="col-10">
                                            <textarea name="meta_description[2]" id="meta_description[2]" rows="5"
                                                      class="form-control">{{ old('meta_description.2' , $category->meta_description(2)) }}</textarea>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mx-auto last">
                                                        <label class="col-2 label-control" for="meta_keywords[2]">Meta
                                                            KeyWords</label>
                                                        <div class="col-10">
                                            <textarea name="meta_keywords[2]" id="meta_keywords[2]"
                                                      class="form-control">{{ old('meta_keywords.2' , $category->meta_keywords(2)) }}</textarea>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                            <!-- Category edit english form ends -->
                                        </div>

                                    </div>

                                    <!-- only image nad approve as global-->
                                    <div class="row" id="global-data">
                                        <div class="col-12">

                                            @include('backend.categories.category_level')

                                            <div class="form-group row mx-auto last">
                                                <label for="discount"
                                                       class="col-2 label-control">Discount</label>
                                                <div class="col-10">
                                                    <input type="number" name="discount" class="form-control"
                                                           step="0.01"
                                                           value="{{ old('discount' , $category->discount) }}">
                                                </div>
                                            </div>


                                            <div class="form-group row mx-auto last">
                                                <label class="col-2 label-control" for="status">Status</label>
                                                <div class="col-10">
                                                    <input type="checkbox" name="status"
                                                           {{ old('status' , $category->status) ? 'checked' : '' }}
                                                           data-size="lg" class="switchery shadow" data-color="info">
                                                </div>
                                            </div>

                                            <div class="form-group row mx-auto last">
                                                <label class="col-2 label-control" for="show_in_main">Show in Main Page</label>
                                                <div class="col-10">
                                                    <input type="checkbox" name="show_in_main"
                                                           {{ old('show_in_main' , $category->show_in_main) ? 'checked' : '' }}
                                                           data-size="lg" class="switchery shadow" data-color="info">
                                                </div>
                                            </div>

                                            <div class="form-group row mx-auto last">
                                                <label for="image" class="col-2 label-control">Image</label>
                                                <div class="col-10 ">
                                                    <input type="file" id="image" name="image" class="form-control">
                                                    @if(! empty($category->image))
                                                        <div class="form-control">
                                                            <a href="{{ url($category->image) }}" target="_blank">
                                                                <img style="object-fit: cover; max-width: 200px"
                                                                     src="{{ url($category->image) }}"
                                                                     alt="category image">
                                                            </a>
                                                            <a class="ml-4 confirm-delete-image"
                                                               href="{{ route('admin.delete-category-image' , $category->id) }}"
                                                               record_type="category" record_id="{{ $category->id }}">Delete
                                                                Image</a>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Button -->
                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                        <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">
                                            Save
                                            changes
                                        </button>
                                        <button type="reset" class="btn btn-light">Cancel</button>
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

            // display global data from more info tap
            $('#english-tab').click(function () {
                $('#global-data').show();
            })

            $('#arabic-tab').click(function () {
                $('#global-data').show();
            })

            // hidden global data from more info tap
            $('#english-more-info-tab').click(function () {
                $('#global-data').hide();
            })

            $('#arabic-more-info-tab').click(function () {
                $('#global-data').hide();
            })


            //sweet alert for delete image
            $('.confirm-delete-image').click(function (event) {
                event.preventDefault();

                type = $(this).attr('record_type');
                id = $(this).attr('record_id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'Please click cofirm to delete this image for ' + type + ' (id = ' + id + ').',
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
                        window.location.href = "/admin/delete-" + type + "-image/" + id;
                    } else {
                        if (result.dismiss == 'cancel') {
                            Swal.fire('Cancelled', 'Delete Cancelled :)', 'error');
                        }
                    }
                })
            })
        })
    </script>
@endsection
