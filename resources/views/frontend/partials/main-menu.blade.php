<!-- Header Inner -->
<div class="header-inner">
    <div class="container">
        <div class="cat-nav-head">
            <div class="row">

                <div class="col-12">
                    <div class="menu-area">
                        <!-- Main Menu -->
                        <nav class="navbar navbar-expand-lg">
                            <div class="navbar-collapse">
                                <div class="nav-inner">
                                    <ul class="nav main-menu menu navbar-nav">
                                        <li class="active"><a href="#">Home</a></li>
                                        <!-- Display categoires and levelchildren-->
                                        @if(count($categories) > 0)
                                            @foreach($categories as $category)
                                                <li>
                                                <a href="{{  route('shop.show-category' , $category->url) }}">{{ $category->name }}
                                                    {!! count($category->childCategories) > 0 ? '<i class="ti-angle-down"></i>' : '' !!}
                                                </a>
                                                    @if(count($category->childCategories) > 0)
                                                    <ul class="dropdown">
                                                    @foreach($category->childCategories as $category)
                                                            @include('frontend.category.navbar-categories' , ['category' => $category])
                                                    @endforeach
                                                    </ul>
                                                @endif
                                                </li>
                                            @endforeach
                                        @endif

                                        <li><a href="{{ route('shop.categories') }}">Categories</a></li>
                                        <li><a href="{{ route('shop.brands') }}">Brands</a></li>
                                        <li><a href="#">Pages</a></li>
                                        <li><a href="#">Blog<i class="ti-angle-down"></i></a>
                                            <ul class="dropdown">
                                                <li><a href="blog-single-sidebar.html">Blog Single Sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.html">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                        <!--/ End Main Menu -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ End Header Inner -->
