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
                            <li class="active">All Categories</li>
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

                @forelse($allCategories as $category)
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
                        <div class="department-item">
                            <div class="dep-icon">
                                <a href="{{ route('shop.show-category' , $category->url) }}">
                                    <img src="{{ $category->image }}" alt="">
                                </a>
                            </div>
                            <h2 class="dep-title">
                                <a href="{{ route('shop.show-category' , $category->url) }}">
                                {{ $category->name }}
                                </a>
                            </h2>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
                        <div class="department-item">
                            <h2 class="dep-title">No Categories to show! </h2>
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
