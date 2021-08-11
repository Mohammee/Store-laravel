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

            <form id="model-optoin-choice-form" action="">

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


