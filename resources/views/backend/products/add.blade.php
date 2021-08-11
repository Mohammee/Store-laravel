@extends('backend.layouts.master')

@section('title' , 'Create Product')

@section('extra-css')

@endsection


@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row mb-2">
                <h1>Pordcuts | <i class="la la-home"></i> - Create Product</h1>
            </div>


            <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">

            @csrf

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


                <ul class="nav nav-tabs mb-2" role="tablist">

                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center active" id="information-tab" data-toggle="tab"
                           href="#information" aria-controls="information" role="tab" aria-selected="true">
                            <i class="ft-info mr-25"></i><span class="d-none d-sm-block">Information</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center" id="data-tab" data-toggle="tab" href="#data"
                           aria-controls="data" role="tab" aria-selected="false">
                            <i class="ft-user mr-25"></i><span class="d-none d-sm-block">Optional Data</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center" id="media-tab" data-toggle="tab" href="#media"
                           aria-controls="media" role="tab" aria-selected="false">
                            <i class="la la-image"></i><span class="d-none d-sm-block">Media</span>
                        </a>
                    </li>

                </ul>

                <div class="card">
                    <div class="card-content">
                        <div class="card-body">

                            <div class="tab-content">
                                <div class="tab-pane active" id="information" aria-labelledby="information-tab"
                                     role="tabpanel">
                                    <!-- users edit media object start -->
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
                                                <i class="flag-icon flag-icon-gb"></i><span class="d-none d-sm-block">Meta Info in English</span>
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
                                                <i class="flag-icon flag-icon-ps"></i><span class="d-none d-sm-block">Meta Info in Arabic</span>
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
                                                        <label class="col-2 label-control" for="name[1]">Prodcut
                                                            Name</label>
                                                        <div class="col-10">
                                                            <input type="text" id="name[1]" class="form-control"
                                                                   value="{{ old('name.1') }}"
                                                                   name="name[1]">
                                                        </div>
                                                    </div>


                                                    <div class="form-group row mx-auto">
                                                        <label class="col-2 label-control" for="url[1]">url</label>
                                                        <div class="col-10">
                                                            <input type="text" id="url[1]" class="form-control"
                                                                   name="url[1]"
                                                                   value="{{ old('url.1') }}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mx-auto last">
                                                        <label class="col-2 label-control"
                                                               for="description[1]">Description</label>
                                                        <div class="col-10">
                                            <textarea name="description[1]" id="description[1]"
                                                      class="form-control summernote">{{ old('description.1') }}</textarea>
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
                                                                   class="form-control"
                                                                   value="{{ old('meta_title.1') }}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mx-auto last">
                                                        <label class="col-2 label-control" for="meta_description[1]">Meta
                                                            Description</label>
                                                        <div class="col-10">
                                            <textarea name="meta_description[1]" id="meta_description[1]" rows="5"
                                                      class="form-control">{{ old('meta_description.1') }}</textarea>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mx-auto last">
                                                        <label class="col-2 label-control" for="meta_keywords[1]">Meta
                                                            KeyWords</label>
                                                        <div class="col-10">
                                            <textarea name="meta_keywords[1]" id="meta_keywords[1]"
                                                      class="form-control">{{ old('meta_keywords.1') }}</textarea>
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
                                                                   value="{{ old('name.2') }}"
                                                                   name="name[2]">
                                                        </div>
                                                    </div>


                                                    <div class="form-group row mx-auto">
                                                        <label class="col-2 label-control" for="url[2]">url</label>
                                                        <div class="col-10">
                                                            <input type="text" id="url[2]" class="form-control"
                                                                   name="url[2]"
                                                                   value="{{ old('url.2') }}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mx-auto last">
                                                        <label class="col-2 label-control"
                                                               for="description[2]">Description</label>
                                                        <div class="col-10">
                                            <textarea name="description[2]" id="description[2]"
                                                      class="form-control summernote">{{ old('description.2') }}</textarea>
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
                                                            <input type="text" name="meta_title[2]" id="meta_title[2]"
                                                                   class="form-control"
                                                                   value="{{ old('meta_title.2') }}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mx-auto last">
                                                        <label class="col-2 label-control" for="meta_description[2]">Meta
                                                            Description</label>
                                                        <div class="col-10">
                                            <textarea name="meta_description[2]" id="meta_description[2]" rows="5"
                                                      class="form-control">{{ old('meta_description.2') }}</textarea>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mx-auto last">
                                                        <label class="col-2 label-control" for="meta_keywords[2]">Meta
                                                            KeyWords</label>
                                                        <div class="col-10">
                                            <textarea name="meta_keywords[2]" id="meta_keywords[2]"
                                                      class="form-control">{{ old('meta_keywords.2') }}</textarea>
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


                                            <div class="form-group row mx-auto last">
                                                <label for="main_price"
                                                       class="col-2 label-control">Price</label>
                                                <div class="col-10">
                                                    <input id="main_price" type="number" name="main_price"
                                                           class="form-control"
                                                           step="0.01"
                                                           value="{{ old('mian_price') }}">
                                                </div>
                                            </div>


                                            <div class="form-group row mx-auto last">
                                                <label for="quantity"
                                                       class="col-2 label-control">Quantity</label>
                                                <div class="col-10">
                                                    <input type="text" id="quantity" name="quantity"
                                                           class="form-control"
                                                           value="{{ old('quantity') }}">
                                                </div>
                                            </div>

                                            <div class="form-group row mx-auto last">
                                                <label class="col-2 label-control" for="status">Status</label>
                                                <div class="col-10">
                                                    <input type="checkbox" name="status"
                                                           {{ old('status') ? 'checked' : '' }}
                                                           data-size="lg" class="switchery shadow" data-color="info">
                                                </div>
                                            </div>

                                            <div class="form-group row mx-auto last">
                                                <label class="col-2 label-control" for="featured">Is Feature</label>
                                                <div class="col-10">
                                                    <input type="checkbox" name="featured"
                                                           {{ old('featured') ? 'checked' : '' }}
                                                           data-size="lg" class="switchery shadow" data-color="info">
                                                </div>
                                            </div>


                                            <div class="form-group row mx-auto last">
                                                <label class="col-2 label-control" for="free_shipping">Free
                                                    Shipping</label>
                                                <div class="col-10">
                                                    <input type="checkbox" name="free_shipping"
                                                           {{ old('free_shipping') ? 'checked' : '' }}
                                                           data-size="lg" class="switchery shadow" data-color="info">
                                                </div>
                                            </div>


                                            <div class="form-group row mx-auto last">
                                                <label for="categories[]" class="col-2 label-control">Categories</label>
                                                <div class="col-10">
                                                    <select name="categories[]" id="categories[]"
                                                            class="form-control palceholder-multiple-select2"
                                                            multiple="multiple">
                                                        @foreach($categories as $category)
                                                            <option value="{{ $category->id }}">
                                                                {{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="form-group row mx-auto last">
                                                <label for="brands[]" class="col-2 label-control">Brands</label>
                                                <div class="col-10">
                                                    <select name="brands[]" id="brands[]"
                                                            class="form-control palceholder-multiple-select2"
                                                            multiple="multiple">
                                                        @foreach($brands as $brand)
                                                            <option value="{{ $brand->id }}">
                                                                {{ $brand->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>


                                        </div>
                                    </div>


                                </div>


                                <div class="tab-pane" id="data" aria-labelledby="data-tab" role="tabpanel">
                                    <!-- product edit attripite form start -->


                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0 h6">Product Variation</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" value="Colors" disabled="">
                                                </div>
                                                <div class="col-md-8">
                                                    <select
                                                        class="form-control colorSelect2 color-select"
                                                        multiple="multiple" name="colors[]" id="colors"
                                                        disabled="disabled">

                                                        @foreach($colors as $color)
                                                            <option value="{{ $color->id }}"
                                                                    data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:{{ $color->code }} ;width:15px ; height:15px;'></span><span>{{ $color->name }}</span></span>">
                                                                {{ $color->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-1">
                                                    <label class=" mb-0">
                                                        <input class="switchery color-switch" value="1" data-size="sm"
                                                               type="checkbox" name="colors_active">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" value="Attributes"
                                                           disabled="">
                                                </div>
                                                <div class="col-md-8">
                                                    <select name=" choice_attributes[]" id="choice_attributes"
                                                            class="form-control palceholder-multiple-select2"
                                                            multiple="multiple">
                                                        @foreach($options as $option)
                                                            <option
                                                                value="{{ $option->id }}">{{ $option->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div>
                                                <p>Choose the attributes of this product and then input values of
                                                    each attribute</p>
                                                <br>
                                            </div>

                                            <div class="customer_choice_options" id="customer_choice_options">

                                            </div>

                                            <div class="sku_combination" id="sku_combination">

                                            </div>
                                        </div>
                                    </div>

                                    <!-- product edit Info form ends -->
                                </div>


                                {{--  media tab--}}
                                <div class="tab-pane " id="media" aria-labelledby="media-tab"
                                     role="tabpanel">

                                    <div class="form-group row mx-auto last">
                                        <label for="vedio"
                                               class="col-2 label-control">Vedio</label>
                                        <div class="col-10">
                                            <input type="text" name="vedio" class="form-control"
                                                   value="{{ old('vedio') }}"
                                                   placeholder="Put vedio url : Youtube,instegram,vimeo,faceboock">

                                        </div>
                                    </div>


                                    <div class="form-group row mx-auto last">
                                        <label for="image" class="col-2 label-control">Main Image</label>
                                        <div class="col-10 ">
                                            <input type="file" id="image" name="main_image" class="form-control">
                                        </div>
                                    </div>


                                    <div class="form-group row mx-auto last">
                                        <label for="images" class="col-2 label-control">Images</label>
                                        <div class="col-10 ">
                                            <input type="file" id="images" name="images[]" class="form-control"
                                                   multiple>

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
                                <!-- users edit account form ends -->


                            </div>

                        </div>
                    </div>
                </div>


            </form>
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


            //add placeholder to select2 multiple
            $('.palceholder-multiple-select2').select2({
                multiple: true,
                width: '100%',
                height: '30px',
                placeholder: "Select Item",
                allowClear: true
            })

        });


        $('.colorSelect2').select2({
            // ...
            multiple: true,
            width: '100%',
            height: '30px',
            placeholder: "Select Item",
            allowClear: true,
            templateResult: function (data, container) {
                // Add custom attributes to the <option> tag for the selected option
               return  $(data.element).attr('data-content');
                // return data.text;
            },
            escapeMarkup: function(m) { return m; }
        });
        $(document).on('click', '.color-switch', function (e) {
            if ($(this).is(':checked')) {
                $('.color-select').prop('disabled', false);
            } else {
                $('.color-select').prop('disabled', true);
            }
        });


        $('#colors').on('change' , function () {
          update_sku();
        })

        function delete_variant (rm , id) {
          $(rm).parent().parent().parent().find('.footable-detail-row-' + id).remove();
          $(rm).closest('.variant').remove();
        }

        $('#choice_attributes').on('change', function () {
            $('#customer_choice_options').html(null);
            $.each($('#choice_attributes option:selected'), function () {
                add_more_option_choice($(this).val(), $(this).text())
            })

            update_sku();
        })

        function update_sku() {
            $.ajax({
                type: 'GET',
                data: $("form").serialize(),
                url: '{{ route('admin.sku-combiantion') }}',
                success: function (data) {
                    console.log(data)
                    $('#sku_combination').html(data);
                },
                error: function (e) {
                    console.log(e)
                    if(confirm('Error ! reload this page.'))
                    {
                        location.reload();
                    }
                }
            })
        }

        function add_more_option_choice(i, name) {
            $.ajax({
                header: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                type: 'GET',
                url: '{{ route('admin.add-more-option-choice') }}',
                data: {attribute_id: i},
                success: function (data) {
                    $('#customer_choice_options').append('\
                <div class="form-group row">\
                    <div class="col-md-3">\
                        <input type="hidden" name="choice_no[]" value="' + i + '">\
                        <input type="text" class="form-control" name="choice[]" value="' + name + '" placeholder="Choice Title" readonly>\
                    </div>\
                    <div class="col-md-8">\
                        <select  class="form-control selector  "\
                                                 data-live-search="true" name="choice_options_' + i + '[]" multiple>\
                            ' + data + '\
                        </select>\
                    </div>\
                </div>');

                    $('.selector').select2({
                        multiple: true,
                        width: '100%',
                        height: '30px',
                        placeholder: "Select Item",
                        allowClear: true
                    })

                    $('.selector').on('change',  function () {
                        update_sku();
                    })
                },
                error: function (e) {
                    console.log(e)
                    if(confirm('Error ! reload this page.'))
                    {
                        location.reload();
                    }
                }
            })
        }

    </script>
@endsection
