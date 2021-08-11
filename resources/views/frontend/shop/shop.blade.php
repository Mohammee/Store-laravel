@extends('frontend.layout')
@section('title' , 'Shop')

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
                            <li class="active">Shop</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Product Style -->
    <section class="product-area shop-sidebar shop section">
        <div class="container">
            {{--            <div class="row">--}}
            <form method="GET" id="filter-form" class="row">

                <div class="col-lg-3 col-md-4 col-12">
                    <div class="shop-sidebar">
                        <!-- Single Widget -->
                        <div class="single-widget category">
                            <h3 class="title">Categories</h3>

                            @if(count($category->childCategories) > 0)
                                <ul class="categor-list">
                                    @foreach($category->childCategories as $child)
                                        @include('frontend.category.children' , ['child' => $child])
                                    @endforeach
                                </ul>
                            @else
                                {{ 'You have no Categories!' }}
                            @endif
                            {{--                            <li><label><input type="checkbox" class="changeable" value="4" name="brands[]">--}}
                            {{--                                    <span style="margin-left:10px;margin-right:10px;">Zendure</span></label>--}}
                            {{--                            </li>--}}
                            {{--                            <li><label><input type="checkbox" class="changeable" value="4" name="brands[]">--}}
                            {{--                                    <span style="margin-left:10px;margin-right:10px;">Zendure</span></label>--}}
                            {{--                            </li>--}}
                            {{--                                </ul>--}}
                            {{--                                <li><a href="#">trousers</a></li>--}}
                            {{--                                <li><a href="#">kitwears</a></li>--}}
                            {{--                                <li><a href="#">accessories</a></li>--}}

                        </div>
                        <!--/ End Single Widget -->

                        <!-- Single Widget -->
                        <div class="single-widget Brands">
                            <h3 class="title">Brands</h3>
                            <ul>
                                @forelse($brands as $brand)
                                    <li>
                                        <label>
                                            <input type="checkbox" class="changeable"
                                                   {{ request()->filled('brands') &&  in_array($brand->id ,request('brands')) ? 'checked' : '' }}
                                                   value="{{ $brand->id }}" name="brands[]">
                                            <span style="margin-left:10px;margin-right:10px;">{{ $brand->name }}</span>
                                        </label>
                                    </li>

                                @empty
                                    {{ 'You have no Categories!' }}
                                @endforelse
                            </ul>

                        </div>
                        <!--/ End Single Widget -->


                        <!-- Shop By Price -->
                        <div class="single-widget range">
                            <h3 class="title">Shop by Price</h3>
                            <div class="price-filter">
                                <div class="price-filter-inner">
                                    <div id="slider-range"
                                         class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                        <div class="ui-slider-range ui-widget-header ui-corner-all"
                                             style="width: 42.6%; left: 24%;"></div>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"
                                              style="left: 24%;"></span><span
                                            class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"
                                            style="left: 66.6%;"></span></div>
                                    <div class="price_slider_amount">
                                        <div class="label-input">
                                            <span>Range ($):</span>
                                            <input type="text" id="amount" name="price" class="form-control"
                                                   placeholder="Add Your Price">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ End Shop By Price -->
                        <!-- Single Widget -->

                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="row">
                        <div class="col-12">
                            <!-- Shop Top -->
                            <div class="shop-top">
                                <div class="shop-shorter">
                                    <div class="single-shorter" id="select-sort">
                                        <label>Sort By :</label>
                                        <select class="changeable" name="sortBy">
                                            <option value="newest" {{ request('sortBy') == 'newest' ? 'selected' : '' }} >Newest</option>
                                            <option value="oldest" {{ request('sortBy') == 'oldest' ? 'selected' : '' }}>Oldest</option>
                                            <option value="high_price" {{ request('sortBy') == 'high_price'? 'selected' : ''  }}>Higher Price</option>
                                            <option value="lower_price" {{ request('sortBy') == 'lower_price'? 'selected' : ''  }}>Lower Price</option>
                                            <option>Size</option>
                                        </select>
                                    </div>
                                </div>
                                <ul class="view-mode">
                                    <li class="active"><a href="shop-grid.html"><i class="fa fa-th-large"></i></a></li>
                                    <li><a href="shop-list.html"><i class="fa fa-th-list"></i></a></li>
                                </ul>
                            </div>
                            <!--/ End Shop Top -->
                        </div>
                    </div>
                    <div id="product-list">
                    <div id="products-area" class="row">

                        @forelse($products as $product)

                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 col-6 mb-2">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="product-details.html">
                                            <img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
                                            <img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
                                        </a>
                                        <div class="button-head">
                                            <div class="product-action">
                                                <a data-toggle="modal" data-target="#exampleModal" title="Quick View"
                                                   class="btn-quickview" product-id="{{ $product->id }}">
                                                <i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                                <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                            </div>
                                            <div class="product-action-2">
                                                <a title="Add to cart" href="#">Add to cart</a>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="product-content">
                                        <h3><a href="">{{ $product->name }}</a>
                                        </h3>

                                        <div class="product-price">

                                                {{ '($' . $product->price . ')' }}

                                        </div>
                                    </div>
                                </div>
                            </div>

                        @empty
                            <div class="text-center col-12">
                                <br>
                                <br>
                                <br>
                                <h4 class="text-center">لا يوجد منتجات لعرضها </h4>
                                <br>
                                <br>
                                <br>
                            </div>
                        @endforelse
                        {{--							<div class="col-lg-4 col-md-6 col-12">--}}
                        {{--								<div class="single-product">--}}
                        {{--									<div class="product-img">--}}
                        {{--										<a href="product-details.html">--}}
                        {{--											<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">--}}
                        {{--											<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">--}}
                        {{--										</a>--}}
                        {{--										<div class="button-head">--}}
                        {{--											<div class="product-action">--}}
                        {{--												<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>--}}
                        {{--												<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>--}}
                        {{--												<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>--}}
                        {{--											</div>--}}
                        {{--											<div class="product-action-2">--}}
                        {{--												<a title="Add to cart" href="#">Add to cart</a>--}}
                        {{--											</div>--}}
                        {{--										</div>--}}
                        {{--									</div>--}}
                        {{--									<div class="product-content">--}}
                        {{--										<h3><a href="product-details.html">Women Hot Collection</a></h3>--}}
                        {{--										<div class="product-price">--}}
                        {{--											<span>$29.00</span>--}}
                        {{--										</div>--}}
                        {{--									</div>--}}
                        {{--								</div>--}}
                        {{--							</div>--}}
                        {{--							<div class="col-lg-4 col-md-6 col-12">--}}
                        {{--								<div class="single-product">--}}
                        {{--									<div class="product-img">--}}
                        {{--										<a href="product-details.html">--}}
                        {{--											<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">--}}
                        {{--											<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">--}}
                        {{--										</a>--}}
                        {{--										<div class="button-head">--}}
                        {{--											<div class="product-action">--}}
                        {{--												<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>--}}
                        {{--												<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>--}}
                        {{--												<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>--}}
                        {{--											</div>--}}
                        {{--											<div class="product-action-2">--}}
                        {{--												<a title="Add to cart" href="#">Add to cart</a>--}}
                        {{--											</div>--}}
                        {{--										</div>--}}
                        {{--									</div>--}}
                        {{--									<div class="product-content">--}}
                        {{--										<h3><a href="product-details.html">Awesome Pink Show</a></h3>--}}
                        {{--										<div class="product-price">--}}
                        {{--											<span>$29.00</span>--}}
                        {{--										</div>--}}
                        {{--									</div>--}}
                        {{--								</div>--}}
                        {{--							</div>--}}
                        {{--							<div class="col-lg-4 col-md-6 col-12">--}}
                        {{--								<div class="single-product">--}}
                        {{--									<div class="product-img">--}}
                        {{--										<a href="product-details.html">--}}
                        {{--											<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">--}}
                        {{--											<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">--}}
                        {{--										</a>--}}
                        {{--										<div class="button-head">--}}
                        {{--											<div class="product-action">--}}
                        {{--												<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>--}}
                        {{--												<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>--}}
                        {{--												<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>--}}
                        {{--											</div>--}}
                        {{--											<div class="product-action-2">--}}
                        {{--												<a title="Add to cart" href="#">Add to cart</a>--}}
                        {{--											</div>--}}
                        {{--										</div>--}}
                        {{--									</div>--}}
                        {{--									<div class="product-content">--}}
                        {{--										<h3><a href="product-details.html">Awesome Bags Collection</a></h3>--}}
                        {{--										<div class="product-price">--}}
                        {{--											<span>$29.00</span>--}}
                        {{--										</div>--}}
                        {{--									</div>--}}
                        {{--								</div>--}}
                        {{--							</div>--}}
                        {{--							<div class="col-lg-4 col-md-6 col-12">--}}
                        {{--								<div class="single-product">--}}
                        {{--									<div class="product-img">--}}
                        {{--										<a href="product-details.html">--}}
                        {{--											<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">--}}
                        {{--											<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">--}}
                        {{--											<span class="new">New</span>--}}
                        {{--										</a>--}}
                        {{--										<div class="button-head">--}}
                        {{--											<div class="product-action">--}}
                        {{--												<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>--}}
                        {{--												<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>--}}
                        {{--												<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>--}}
                        {{--											</div>--}}
                        {{--											<div class="product-action-2">--}}
                        {{--												<a title="Add to cart" href="#">Add to cart</a>--}}
                        {{--											</div>--}}
                        {{--										</div>--}}
                        {{--									</div>--}}
                        {{--									<div class="product-content">--}}
                        {{--										<h3><a href="product-details.html">Women Pant Collectons</a></h3>--}}
                        {{--										<div class="product-price">--}}
                        {{--											<span>$29.00</span>--}}
                        {{--										</div>--}}
                        {{--									</div>--}}
                        {{--								</div>--}}
                        {{--							</div>--}}
                        {{--							<div class="col-lg-4 col-md-6 col-12">--}}
                        {{--								<div class="single-product">--}}
                        {{--									<div class="product-img">--}}
                        {{--										<a href="product-details.html">--}}
                        {{--											<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">--}}
                        {{--											<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">--}}
                        {{--										</a>--}}
                        {{--										<div class="button-head">--}}
                        {{--											<div class="product-action">--}}
                        {{--												<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>--}}
                        {{--												<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>--}}
                        {{--												<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>--}}
                        {{--											</div>--}}
                        {{--											<div class="product-action-2">--}}
                        {{--												<a title="Add to cart" href="#">Add to cart</a>--}}
                        {{--											</div>--}}
                        {{--										</div>--}}
                        {{--									</div>--}}
                        {{--									<div class="product-content">--}}
                        {{--										<h3><a href="product-details.html">Awesome Bags Collection</a></h3>--}}
                        {{--										<div class="product-price">--}}
                        {{--											<span>$29.00</span>--}}
                        {{--										</div>--}}
                        {{--									</div>--}}
                        {{--								</div>--}}
                        {{--							</div>--}}
                        {{--							<div class="col-lg-4 col-md-6 col-12">--}}
                        {{--								<div class="single-product">--}}
                        {{--									<div class="product-img">--}}
                        {{--										<a href="product-details.html">--}}
                        {{--											<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">--}}
                        {{--											<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">--}}
                        {{--											<span class="price-dec">30% Off</span>--}}
                        {{--										</a>--}}
                        {{--										<div class="button-head">--}}
                        {{--											<div class="product-action">--}}
                        {{--												<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>--}}
                        {{--												<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>--}}
                        {{--												<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>--}}
                        {{--											</div>--}}
                        {{--											<div class="product-action-2">--}}
                        {{--												<a title="Add to cart" href="#">Add to cart</a>--}}
                        {{--											</div>--}}
                        {{--										</div>--}}
                        {{--									</div>--}}
                        {{--									<div class="product-content">--}}
                        {{--										<h3><a href="product-details.html">Awesome Cap For Women</a></h3>--}}
                        {{--										<div class="product-price">--}}
                        {{--											<span>$29.00</span>--}}
                        {{--										</div>--}}
                        {{--									</div>--}}
                        {{--								</div>--}}
                        {{--							</div>--}}
                        {{--							<div class="col-lg-4 col-md-6 col-12">--}}
                        {{--								<div class="single-product">--}}
                        {{--									<div class="product-img">--}}
                        {{--										<a href="product-details.html">--}}
                        {{--											<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">--}}
                        {{--											<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">--}}
                        {{--										</a>--}}
                        {{--										<div class="button-head">--}}
                        {{--											<div class="product-action">--}}
                        {{--												<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>--}}
                        {{--												<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>--}}
                        {{--												<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>--}}
                        {{--											</div>--}}
                        {{--											<div class="product-action-2">--}}
                        {{--												<a title="Add to cart" href="#">Add to cart</a>--}}
                        {{--											</div>--}}
                        {{--										</div>--}}
                        {{--									</div>--}}
                        {{--									<div class="product-content">--}}
                        {{--										<h3><a href="product-details.html">Polo Dress For Women</a></h3>--}}
                        {{--										<div class="product-price">--}}
                        {{--											<span>$29.00</span>--}}
                        {{--										</div>--}}
                        {{--									</div>--}}
                        {{--								</div>--}}
                        {{--							</div>--}}
                        {{--							<div class="col-lg-4 col-md-6 col-12">--}}
                        {{--								<div class="single-product">--}}
                        {{--									<div class="product-img">--}}
                        {{--										<a href="product-details.html">--}}
                        {{--											<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">--}}
                        {{--											<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">--}}
                        {{--											<span class="out-of-stock">Hot</span>--}}
                        {{--										</a>--}}
                        {{--										<div class="button-head">--}}
                        {{--											<div class="product-action">--}}
                        {{--												<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>--}}
                        {{--												<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>--}}
                        {{--												<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>--}}
                        {{--											</div>--}}
                        {{--											<div class="product-action-2">--}}
                        {{--												<a title="Add to cart" href="#">Add to cart</a>--}}
                        {{--											</div>--}}
                        {{--										</div>--}}
                        {{--									</div>--}}
                        {{--									<div class="product-content">--}}
                        {{--										<h3><a href="product-details.html">Black Sunglass For Women</a></h3>--}}
                        {{--										<div class="product-price">--}}
                        {{--											<span class="old">$60.00</span>--}}
                        {{--											<span>$50.00</span>--}}
                        {{--										</div>--}}
                        {{--									</div>--}}
                        {{--								</div>--}}
                        {{--							</div>--}}
                        {{--							<div class="col-lg-4 col-md-6 col-12">--}}
                        {{--								<div class="single-product">--}}
                        {{--									<div class="product-img">--}}
                        {{--										<a href="product-details.html">--}}
                        {{--											<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">--}}
                        {{--											<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">--}}
                        {{--											<span class="new">New</span>--}}
                        {{--										</a>--}}
                        {{--										<div class="button-head">--}}
                        {{--											<div class="product-action">--}}
                        {{--												<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>--}}
                        {{--												<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>--}}
                        {{--												<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>--}}
                        {{--											</div>--}}
                        {{--											<div class="product-action-2">--}}
                        {{--												<a title="Add to cart" href="#">Add to cart</a>--}}
                        {{--											</div>--}}
                        {{--										</div>--}}
                        {{--									</div>--}}
                        {{--									<div class="product-content">--}}
                        {{--										<h3><a href="product-details.html">Women Pant Collectons</a></h3>--}}
                        {{--										<div class="product-price">--}}
                        {{--											<span>$29.00</span>--}}
                        {{--										</div>--}}
                        {{--									</div>--}}
                        {{--								</div>--}}
                        {{--							</div>--}}


                    </div>

                        <div class="clearfix col-12 mt-5 load-more-section">

                            @if($products->hasMorePages())
                                <a class=" btn btn-common" id="btn-load-more"
                                   style="margin:auto; display:table; margin-bottom:20px;cursor:pointer;color: #fff;">
                                    Load More
                                </a>
                            @endif
                        </div>

                    </div>


                </div>
            </form>
        </div>
        {{--        </div>--}}
    </section>
    <!--/ End Product Style 1  -->



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

        $(document).ready(function () {

            $('.changeable').change(function (e) {
                $('#filter-form').submit();
            })

            $("body").on('submit', '#filter-form', function (e) {
                $('#products-area').animate({'opacity': '0.4'});
                var formData = $(this).serialize();

                $.ajaxSetup({
                    "header": {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                })

                $.ajax({
                    url: "{{ route('shop.filter' , $category->url ) }}",
                    method: 'GET',
                    data: formData,
                    dataType: 'html',
                    success: function (data) {
                        // console.log(data)
                        $('#product-list').html(data).animate({'opacity': '1'});

                        window.history.pushState({"html": '', "pageTitle": ''}, '',
                            "{{ route('shop.show-category' , $category->url) }}" + '?' + formData);

                         page = 2;

                    },
                    erorr: function () {

                    },

                });
                return false;
            })
        });


        $(document).on('click' , '#btn-load-more' ,function () {


            var data = $('#filter-form').serialize() + '&page=' + page;
            page++;


            $('#btn-load-more').text('Please waite ....')
            $.ajaxSetup({
                "header": {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })

            $.ajax({
                url: "{{ route('shop.load_more' , $category->url ) }}",
                method: 'GET',
                data: data,
                dataType: 'text',
                success: function (data) {
                     if($.trim(data) != '')
                     {
                         $('#products-area').append(data);
                         $('#btn-load-more').text('LODE MORE');
                     }else{
                         $('#btn-load-more').text('Not have more');
                         $('#btn-load-more').prop('disabled', true);
                         $('#btn-load-more').css('cursor', 'not-allowed');
                     }


                },
                erorr: function (error) {
               console.log(erorr)
                },

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
