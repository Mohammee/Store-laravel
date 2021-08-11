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
                            <li class="active">All Brands</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Product Style -->
    <section class="section">
        <div class="container">
            <div class="row">

                @forelse($allBrands as $brand)
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
                        <div class="department-item">
                            <div class="dep-icon">
                                <a href="{{ route('shop.show-brand' , $brand->url) }}">
                                    <img src="{{ $brand->image }}" alt="">
                                </a>
                            </div>
                            <h2 class="dep-title">
                                <a href="{{ route('shop.show-brand' , $brand->url) }}">
                                {{ $brand->name }}
                                </a>
                            </h2>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
                        <div class="department-item">
                            <h2 class="dep-title">No Brands to show! </h2>
                        </div>
                    </div>
                @endforelse


            </div>
        </div>

    </section>
    <!--/ End Product Style 1  -->


@section('extra-js')

@endsection

@endsection
