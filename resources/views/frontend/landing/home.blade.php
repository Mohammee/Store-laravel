@extends('frontend.layout')
@section('title' , 'Shop')

@section('extra-css')

@endsection
@section('content')



    <!-- Slider Area -->
    <section class="hero-slider">

        <div id="owl-demo" class="owl-carousel owl-theme">

        @foreach($banners as $banner)
            <!-- Single Slider -->
                <div class="single-slider">
                    <img src="{{ url($banner->background) }}" alt="">

                    <div class="content">
                        <h1>{{ $banner->show_title ? $banner->name : ''  }}</h1>
                        <p>{!! $banner->show_description ? divideText($banner->description) : '' !!} </p>
                        <a href="{{ $banner->url }}">Shop Now</a>
                    </div>

                </div>
            @endforeach

        </div>
    </section>
    <!--/ End Slider Area -->


    <!-- Start products featured Banner -->
    <div class="product-area most-popular section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Featured Item</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel popular-slider ">
                    @forelse($featured_products as $product)
                        <!-- Start Single Product -->
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="product-details.html">
                                        <img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
                                        <img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
                                        <span class="new">New</span>
                                    </a>
                                    <div class="button-head">
                                        <div class="product-action">
                                            <a data-toggle="modal" data-target="#exampleModal" title="Quick View"
                                               class="btn-quickview" product-id="{{ $product->id }}"
                                               href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                            <a title="Wishlist" href="#"><i
                                                    class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                            <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                        </div>
                                        <div class="product-action-2">
                                            <a title="Add to cart" href="#">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="{{ route('products.show' , $product->url) }}">{{ $product->name }}</a></h3>
                                    <div class="product-price">
                                        <span>${{ $product->price }}</span>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product -->
                        @empty
                    </div>
                            <div class="text-center col-12">
                                <br>
                                <br>
                                <br>
                                <h4 class="text-center">لا يوجد منتجات عليها عروض لعرضها لعرضها </h4>
                                <br>
                                <br>
                                <br>

                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End products freatured Banner -->

    <!-- Start Midium Banner  -->
    <section class="section">
        <div class=" midium-banner container">
            <div class="row">

            @foreach($landing_categories as $category)
                <!-- Single Banner  -->
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="single-banner" style=" box-shadow: 0 2px 4px 0 rgb(0 0 0 / 10%), 0 2px 5px 0 rgb(0 0 0 / 15%);
                                         margin: 50px 15px 0 15px;">
                            <img src="{{ $category->image }}" alt="#">
                            <div class="content">
                                <h3><span>{{ $category->name }}s</span></h3>
                                {{--                                <br>--}}
                                <a href="{{ route('shop.show-category' , $category->url) }}">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <!-- /End Single Banner  -->
            @endforeach

            @foreach($landing_categories as $category)
                <!-- Single Banner  -->
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="single-banner" style=" box-shadow: 0 2px 4px 0 rgb(0 0 0 / 10%), 0 2px 5px 0 rgb(0 0 0 / 15%);
                                         margin: 50px 15px 0 15px;">
                            <img src="{{ $category->image }}" alt="#">
                            <div class="content">
                                <h3><span>{{ $category->name }}s</span></h3>
                                {{--                                <br>--}}
                                <a href="{{ route('shop.show-category' , $category->url) }}">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <!-- /End Single Banner  -->
                @endforeach

            </div>
        </div>
    </section>
    <!-- End Midium Banner -->

    <!-- Start Most Popular -->
    <div class="product-area most-popular section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>New Item</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div id="products-area" class="row">
                    @forelse($new_products as $product)
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6 col-6">
                            <!-- Start Single Product -->
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="product-details.html">
                                        <img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
                                        <img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
                                        <span class="out-of-stock">Hot</span>
                                    </a>
                                    <div class="button-head">
                                        <div class="product-action">
                                            <a data-toggle="modal" data-target="#exampleModal" title="Quick View"
                                               class="btn-quickview" product-id="{{ $product->id }}"
                                               href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                            <a title="Wishlist" href="#"><i
                                                    class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                            <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                        </div>
                                        <div class="product-action-2">
                                            <a title="Add to cart" href="#">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="{{ route('products.show' , $product->url) }}">{{ $product->name }}</a>
                                    </h3>

                                    <div class="product-price">

                                        {{ '($' . $product->price . ')' }}

                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product -->
                        </div>
                    @empty
                        <div class="text-center col-12">
                            <br>
                            <br>
                            <br>
                            <h4 class="text-center">لا يوجد منتجات عليها عروض لعرضها لعرضها </h4>
                            <br>
                            <br>
                            <br>
                        </div>
                    @endforelse

                </div><!-- end product areas -->

                <div class="clearfix col-12 mt-5 load-more-section">

                    @if($new_products->hasMorePages())
                        <a class=" btn btn-common" id="btn-load-more-new"
                           style="margin:auto; display:table; margin-bottom:20px;cursor:pointer;color: #fff;">
                            Load More
                        </a>
                    @endif
                </div>

            </div>

        </div>
    </div>
    <!-- End Most Popular Area -->


    <!-- Start Most Popular -->
    <div class="product-area most-popular section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Best Saller</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div id="products-area" class="row">
                    @forelse($new_products as $product)
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6 col-6">
                            <!-- Start Single Product -->
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="product-details.html">
                                        <img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
                                        <img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
                                        <span class="out-of-stock">Hot</span>
                                    </a>
                                    <div class="button-head">
                                        <div class="product-action">
                                            <a data-toggle="modal" data-target="#exampleModal" title="Quick View"
                                               class="btn-quickview" product-id="{{ $product->id }}"
                                               href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                            <a title="Wishlist" href="#"><i
                                                    class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                            <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                        </div>
                                        <div class="product-action-2">
                                            <a title="Add to cart" href="#">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="{{ route('products.show' , $product->url) }}">{{ $product->name }}</a>
                                    </h3>

                                    <div class="product-price">

                                        {{ '($' . $product->price . ')' }}

                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product -->
                        </div>
                    @empty
                        <div class="text-center col-12">
                            <br>
                            <br>
                            <br>
                            <h4 class="text-center">لا يوجد منتجات عليها عروض لعرضها لعرضها </h4>
                            <br>
                            <br>
                            <br>
                        </div>
                    @endforelse

                </div><!-- end product areas -->
                <div class="clearfix col-12 mt-5 load-more-section">

                    @if($new_products->hasPages())
                        <a class=" btn btn-common" id="btn-load-more"
                           style="margin:auto; display:table; margin-bottom:20px;cursor:pointer;color: #fff;">
                            Load More
                        </a>
                    @endif
                </div>

            </div>

        </div>
    </div>
    <!-- End Most Popular Area -->

    <!-- Start Most Popular -->
    <div class="product-area most-popular section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Top Viewed</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div id="products-area" class="row">
                    @forelse($new_products as $product)
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6 col-6">
                            <!-- Start Single Product -->
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="product-details.html">
                                        <img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
                                        <img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
                                        <span class="out-of-stock">Hot</span>
                                    </a>
                                    <div class="button-head">
                                        <div class="product-action">
                                            <a data-toggle="modal" data-target="#exampleModal" title="Quick View"
                                               class="btn-quickview" product-id="{{ $product->id }}"
                                               href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                            <a title="Wishlist" href="#"><i
                                                    class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                            <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                        </div>
                                        <div class="product-action-2">
                                            <a title="Add to cart" href="#">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="{{ route('products.show' , $product->url) }}">{{ $product->name }}</a>
                                    </h3>

                                    <div class="product-price">

                                        {{ '($' . $product->price . ')' }}

                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product -->
                        </div>
                    @empty
                        <div class="text-center col-12">
                            <br>
                            <br>
                            <br>
                            <h4 class="text-center">لا يوجد منتجات عليها عروض لعرضها لعرضها </h4>
                            <br>
                            <br>
                            <br>
                        </div>
                    @endforelse

                </div><!-- end product areas -->

                <div class="clearfix col-12 mt-5 load-more-section">

                    @if($new_products->hasPages())
                        <a class=" btn btn-common" id="btn-load-more"
                           style="margin:auto; display:table; margin-bottom:20px;cursor:pointer;color: #fff;">
                            Load More
                        </a>
                    @endif
                </div>

            </div>

        </div>
    </div>
    <!-- End Most Popular Area -->


    <!-- Start Cowndown Area -->
    <section class="cown-down">
        <div class="section-inner ">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-12 padding-right">
                        <div class="image">
                            <img src="https://via.placeholder.com/750x590" alt="#">
                        </div>
                    </div>
                    <div class="col-lg-6 col-12 padding-left">
                        <div class="content">
                            <div class="heading-block">
                                <p class="small-title">Deal of day</p>
                                <h3 class="title">Beatutyful dress for women</h3>
                                <p class="text">Suspendisse massa leo, vestibulum cursus nulla sit amet, frungilla
                                    placerat lorem. Cars fermentum, sapien. </p>
                                <h1 class="price">$1200 <s>$1890</s></h1>
                                <div class="coming-time">
                                    <div class="clearfix" data-countdown="2021/02/30"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /End Cowndown Area -->

    <!-- Start Shop Blog  -->
    <section class="shop-blog section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>From Our Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Blog  -->
                    <div class="shop-single-blog">
                        <img src="https://via.placeholder.com/370x300" alt="#">
                        <div class="content">
                            <p class="date">22 July , 2020. Monday</p>
                            <a href="#" class="title">Sed adipiscing ornare.</a>
                            <a href="#" class="more-btn">Continue Reading</a>
                        </div>
                    </div>
                    <!-- End Single Blog  -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Blog  -->
                    <div class="shop-single-blog">
                        <img src="https://via.placeholder.com/370x300" alt="#">
                        <div class="content">
                            <p class="date">22 July, 2020. Monday</p>
                            <a href="#" class="title">Man’s Fashion Winter Sale</a>
                            <a href="#" class="more-btn">Continue Reading</a>
                        </div>
                    </div>
                    <!-- End Single Blog  -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Blog  -->
                    <div class="shop-single-blog">
                        <img src="https://via.placeholder.com/370x300" alt="#">
                        <div class="content">
                            <p class="date">22 July, 2020. Monday</p>
                            <a href="#" class="title">Women Fashion Festive</a>
                            <a href="#" class="more-btn">Continue Reading</a>
                        </div>
                    </div>
                    <!-- End Single Blog  -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Shop Blog  -->

    <!-- Start Shop Services Area -->
    <section class="shop-services section home">
        <div class="container">
            <div class="row">

                @forelse($brands as $brand)
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6 col-6 mb-2">
                        <!-- Start Single Service -->
                        <div class="dep-icon">
                            <a href="{{ route('shop.show-brand' , $brand->url) }}">
                                <img src="{{ $brand->image }}" alt="brand-image">
                            </a>
                        </div>
                        <!-- End Single Service -->
                    </div>
                @empty
                    <div class="text-center col-12">
                        <br>
                        <h4 class="text-center">لا يوجد علامات تجارية لعرضها </h4>
                        <br>
                    </div>
                @endforelse

                <div class="clearfix col-12 mb-1">

                    @if($brands->count() >= 4)
                        <a class=" btn btn-rounded"
                           style="margin:auto; display:table; margin-top:20px;cursor:pointer;"
                           href="{{ route('shop.brands') }}">
                            Show All
                        </a>
                    @endif
                </div>

            </div>
        </div>
    </section>
    <!-- End Shop Services Area -->

    <!-- Start Shop Newsletter  -->
    <section class="shop-newsletter section">
        <div class="container">
            <div class="inner-top">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 col-12">
                        <!-- Start Newsletter Inner -->
                        <div class="inner">
                            <h4>Newsletter</h4>
                            <p> Subscribe to our newsletter and get <span>10%</span> off your first purchase</p>
                            <form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
                                <input name="EMAIL" placeholder="Your email address" required="" type="email">
                                <button class="btn">Subscribe</button>
                            </form>
                        </div>
                        <!-- End Newsletter Inner -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Shop Newsletter -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close"
                                                                                                      aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row no-gutters">
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
                                <h2>Flared Shift Dress</h2>
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
                                <h3>$29.00</h3>
                                <div class="quickview-peragraph">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum
                                        ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui
                                        nemo ipsum numquam.</p>
                                </div>
                                <div class="size">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <h5 class="title">Size</h5>
                                            <select>
                                                <option selected="selected">s</option>
                                                <option>m</option>
                                                <option>l</option>
                                                <option>xl</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <h5 class="title">Color</h5>
                                            <select>
                                                <option selected="selected">orange</option>
                                                <option>purple</option>
                                                <option>black</option>
                                                <option>pink</option>
                                            </select>
                                        </div>
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
                                        <input type="text" name="quant[1]" class="input-number" data-min="1"
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
                                <div class="add-to-cart">
                                    <a href="#" class="btn">Add to cart</a>
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
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->


@section('extra-js')
    <script>
        var page = 2;
        $(document).on('click', '#btn-load-more-new', function () {

            var data = 'page=' + page;
            page++;

            $('#btn-load-more-new').text('Please waite ....');

            $.ajaxSetup({
                header: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });

            $.ajax({
                data: data,
                url: "{{ route('landing.load-new-more') }}",
                method: 'GET',
                typeData: 'text',
                success: function (response) {
                    if ($.trim(response) != '') {
                        $('#products-area').append(response);
                        $('#btn-load-more-new').text('LODE MORE');
                    } else {
                        $('#btn-load-more-new').text('Not have more');
                        $('#btn-load-more-new').prop('disabled', true);
                        $('#btn-load-more-new').css('cursor', 'not-allowed');
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            })
        })

        $(document).ready(function () {

            $("#owl-demo").owlCarousel({

                autoplay: 3000, //Set AutoPlay to 3 seconds

                items: 1,
                // ltr: true,
                // rtl:true,
                // itemsDesktop: [1199, 3],
                // itemsDesktopSmall: [979, 3]

            });


        })

        var product_id;
        $(document).on('click', '.btn-quickview', function (e) {
            e.preventDefault();

         var id =  $(this).attr('product-id');
         product_id = id;

            uploadModel(id);
        })

        function uploadModel(id)
        {
            $('.modal-body').html('<div class="preloader-inner">\n' +
                '        <div class="preloader-icon">\n' +
                '            <span></span>\n' +
                '            <span></span>\n' +
                '        </div>\n' +
                '  </div>');

            $.ajaxSetup({
                header : {
                    'X-CSRF-TOKEN' : '{{ csrf_token() }}'
                }
            })

            $.ajax({
                url : "{{ url('/') }}" + '/products/product-model/' + id,
                method : 'GET',
                typeData : 'html',
                success : function (response) {
                    $('.modal-body').html(response);
                    $('select').niceSelect();

                    $('#model-optoin-choice-form input').on('change' , function () {
                        getVariantPrice()
                    })

                    $('#model-optoin-choice-form select').on('change' , function () {
                        getVariantPrice()
                    })

                },
                error : function (e) {
                    console.log(e);

                    if (confirm('Reload this page security error!')) {
                        location.reload();
                    }
                }
            })
        }


        function getVariantPrice() {
            //check qty and can add to cart
             $('.quickview-content').animate({'opacity' : '0.4'})
         $.ajax({
             header : {
                 'X-CSRF-TOKEN' : '{{ csrf_token() }}'
             },
             type : 'POST' ,
             url : '{{ route('product-variant-price') }}',
             data : $('#model-optoin-choice-form').serialize(),
             success : function (data) {
                 var price = data.price;
                 $('#variant-price').text('$' +  price)
                 $('.quickview-content').animate({'opacity': '1'});
             },
             error: function (e) {
                 $('.quickview-content').animate({'opacity': '1'});

                 $('.quantity').remove();
                 $('.default-social').html('<button class="btn btn-unavailable " > UNAVAILABLE </button>');
                 $('.add-to-cart').remove();

                 console.log(e.status)

                   if(e.status == 409)
                   {
                         if (confirm('Reload this page security error!')) {
                             location.reload();
                         }
                   }else if(e.status == 404)
                   {
                       if (confirm('Reload this model, invalid item!')) {
                          uploadModel(product_id)
                       }
                   }
             }
         })
        }


    </script>
@endsection


@endsection
