
<div id="products-area" class="row">

    @forelse($products as $product)

        <div class="col-lg-4 col-md-6 col-12">
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
        <p class="m-lg-4">No data!</p>
@endforelse

</div>
    <div class="clearfix col-12 mt-5 load-more-section">

        @if($products->hasMorePages())
            <a class=" btn btn-common" id="btn-load-more"
               style="margin:auto; display:table; margin-bottom:20px;cursor:pointer;color: #fff;">
                Load More
            </a>
        @endif
    </div>
