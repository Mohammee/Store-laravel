@extends('frontend.layout')
@section('title' , $product->name)

@section('extra-css')

@endsection
@section('content')


    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="index1.html">Home<i class="fa fa-angle-double-right"></i></a></li>
                            <li class="active">{{ $product->name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->


    <div class="row my-4 container">
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <!-- Product Slider -->
            <div class="product-gallery">
                <div class="quickview-slider-active">
                    <div class="single-slider">
                        <img src="https://via.placeholder.com/569x528" alt="#">
                    </div>
                    <div class="single-slider">
                        <img src="https://via.placeholder.com/569x528" alt="#">
                    </div>
                    <div class="single-slider">
                        <img src="https://via.placeholder.com/569x528" alt="#">
                    </div>
                    <div class="single-slider">
                        <img src="https://via.placeholder.com/569x528" alt="#">
                    </div>
                </div>
            </div>
            <!-- End Product slider -->
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <div class="quickview-content">
                <h2>{{ $product->name }}</h2>
                <div class="quickview-ratting-review">
                    <div class="quickview-ratting-wrap">
                        <div class="quickview-ratting">
                            <i class="yellow fa fa-star"></i>
                            <i class="yellow fa fa-star"></i>
                            <i class="yellow fa fa-star"></i>
                            <i class="yellow fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <a href="#"> (1 customer review)</a>
                    </div>
                    <div class="quickview-stock">
                        <span><i class="fa fa-check-circle-o"></i> in stock</span>
                    </div>
                </div>
                <h3 id="variant-price">${{ $product->price }}</h3>
                <div>
                    <h4>Price After select</h4>
                    <h3 class="-price"></h3>

                </div>
                <div class="quickview-peragraph">
                    <p>{{ $product->description }}</p>
                </div>

                <form id="option-choice-form" action="">

                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id }}">

                    @if(count($colors) > 0)
                        <div class="color">
                            <div class="row">
                                <div class=" col-12 mb-4">
                                    <h5 class="title">Color</h5>
                                    <select class="variation" name="color">
                                        @foreach($colors as $color)
                                            <option value="{{ $color->id }}">
                                                {{ $color->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="size">
                        <div class="row">
                            @if(count($product->variations) > 0)
                                @if(count($options) > 0)
                                    @foreach($options as $option)
                                        <div class="col-lg-6 col-12 mb-4">
                                            <h5 class="title">{{ $option->name }}</h5>
                                            <select class="variation" name="attribute_id[]">
                                                @if(count($option->optionValues) > 0)
                                                    @foreach($option->optionValues as $value)
                                                        @if(in_array($value->id , $value_ids))
                                                            <option value="{{ $value->id }}">
                                                                {{ $value->name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    @endforeach
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="quantity">
                        <!-- Input Order -->
                        <div class="input-group">
                            <div class="button minus">
                                <button type="button" class="btn btn-primary btn-number" disabled="disabled"
                                        data-type="minus" data-field="quant[1]">
                                    <i class="ti-minus"></i>
                                </button>
                            </div>
                            <input type="text" name="qyt" class="input-number" data-min="1"
                                   data-max="1000" value="1">
                            <div class="button plus">
                                <button type="button" class="btn btn-primary btn-number" data-type="plus"
                                        data-field="quant[1]">
                                    <i class="ti-plus"></i>
                                </button>
                            </div>
                        </div>
                        <!--/ End Input Order -->
                    </div>
                </form>

                <div class="add-to-cart">
                    <button class="btn">Add to cart</button>
                    <a href="#" class="btn min"><i class="ti-heart"></i></a>
                    <a href="#" class="btn min"><i class="fa fa-compress"></i></a>
                </div>

                <div class="default-social">
                    <h4 class="share-now">Share:</h4>
                    <ul>
                        <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                        <li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="single-pro-tab section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12">


                    <div class="mb-5 shadow-sm rounded single-pro-tab-menu">
                        <div class="nav border-bottom aiz-nav-tabs">
                            <a href="#tab_default_1" data-toggle="tab" class="fs-16 fw-600 text-reset active show">Description</a>
                            <a href="#tab_default_2" data-toggle="tab" class="fs-16 fw-600 text-reset">Video</a>
                            <a href="#tab_default_4" data-toggle="tab" class="fs-16 fw-600 text-reset">Reviews</a>
                        </div>

                        <div class="bg-white tab-content pt-0 mt-4">
                            <div class="tab-pane fade active show" id="tab_default_1">
                                <div class="p-4">
                                    <div class="mw-100 overflow-hidden text-left aiz-editor-data">
                                        <ul class="a-unordered-list a-vertical a-spacing-mini"
                                            style="margin-right: 0px; margin-bottom: 0px; margin-left: 18px; color: rgb(15, 17, 17); padding: 0px; font-family: &quot;Amazon Ember&quot;, Arial, sans-serif; font-size: 14px;">
                                            <li style="list-style: disc; overflow-wrap: break-word; margin: 0px;"><span
                                                    class="a-list-item"
                                                    style="overflow-wrap: break-word; display: block;">100% Polyester</span>
                                            </li>
                                            <li style="list-style: disc; overflow-wrap: break-word; margin: 0px;"><span
                                                    class="a-list-item"
                                                    style="overflow-wrap: break-word; display: block;">Imported</span>
                                            </li>
                                            <li style="list-style: disc; overflow-wrap: break-word; margin: 0px;"><span
                                                    class="a-list-item"
                                                    style="overflow-wrap: break-word; display: block;">Pull On closure</span>
                                            </li>
                                            <li style="list-style: disc; overflow-wrap: break-word; margin: 0px;"><span
                                                    class="a-list-item"
                                                    style="overflow-wrap: break-word; display: block;">Dry Clean Only</span>
                                            </li>
                                            <li style="list-style: disc; overflow-wrap: break-word; margin: 0px;"><span
                                                    class="a-list-item"
                                                    style="overflow-wrap: break-word; display: block;">Sequined cut outs</span>
                                            </li>
                                            <li style="list-style: disc; overflow-wrap: break-word; margin: 0px;"><span
                                                    class="a-list-item"
                                                    style="overflow-wrap: break-word; display: block;">Two-piece set with sleeveless dress and long-sleeve jacket</span>
                                            </li>
                                            <li style="list-style: disc; overflow-wrap: break-word; margin: 0px;"><span
                                                    class="a-list-item"
                                                    style="overflow-wrap: break-word; display: block;">womens dress</span>
                                            </li>
                                        </ul>
                                        <div aria-live="polite"
                                             class="a-row a-expander-container a-expander-inline-container"
                                             style="width: 674.578px; color: rgb(15, 17, 17); font-family: &quot;Amazon Ember&quot;, Arial, sans-serif; font-size: 14px;">
                                            <div aria-expanded="true"
                                                 class="a-expander-content a-expander-extend-content a-expander-content-expanded"
                                                 style="overflow: hidden;">
                                                <ul class="a-unordered-list a-vertical a-spacing-none"
                                                    style="margin-right: 0px; margin-bottom: 0px; margin-left: 18px; padding: 0px;">
                                                    <li style="list-style: disc; overflow-wrap: break-word; margin: 0px;"><span
                                                            class="a-list-item"
                                                            style="overflow-wrap: break-word; display: block;">mother of the bride</span>
                                                    </li>
                                                    <li style="list-style: disc; overflow-wrap: break-word; margin: 0px;"><span
                                                            class="a-list-item"
                                                            style="overflow-wrap: break-word; display: block;">Petite Plus and Missy</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="tab_default_2">
                                <div class="p-4">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item"
                                                src="https://www.youtube.com/embed/uRzEhLm3-hc"></iframe>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab_default_3">
                                <div class="p-4 text-center ">
                                    <a href="" class="btn btn-primary">Download</a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab_default_4">
                                <div class="p-4">
                                    <ul class="list-group list-group-flush">
                                    </ul>

                                    <div class="text-center fs-18 opacity-70">
                                        There have been no reviews for this product yet.
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('extra-js')
    <script>

        $('#option-choice-form input').on('change', function () {
            getVariantPrice()
        })

        $('#option-choice-form select').on('change', function () {
            getVariantPrice()
        })

        function getVariantPrice() {
            //check qty and can add to cart
            $('.quickview-content').animate({'opacity': '0.4'})
            $.ajax({
                header: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                type: 'POST',
                url: '{{ route('product-variant-price') }}',
                data: $('#option-choice-form').serialize(),
                success: function (data) {
                    var price = data.price;
                    $('#variant-price').text('$' + price)
                    $('.quickview-content').animate({'opacity': '1'});
                },
                error: function (e) {
                    $('.quickview-content').animate({'opacity': '1'});

                    $('.quantity').remove();
                    $('#variant-price').text('');
                    $('.default-social').html('<button class="btn btn-unavailable " > UNAVAILABLE </button>');
                    $('.add-to-cart').remove();

                    console.log(e.status)

                    if (e.status == 409) {
                        if (confirm('Reload this page security error!')) {
                            location.reload();
                        }
                    } else if (e.status == 404) {
                        if (confirm('Reload this model, invalid item!')) {
                            location.reload();
                        }
                    }else if (e.status == 400) {

                    }
                }
            })
        }
    </script>
@endsection
