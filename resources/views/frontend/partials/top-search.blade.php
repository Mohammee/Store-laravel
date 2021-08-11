<div class="search-top">
    <div class="top-search"><a href="javascript:void(0)"><i class="ti-search"></i></a></div>
    <!-- Search Form -->
    <div class="search-top">
        <form class="search-form" method="GET" action="{{ route('shop.search') }}">
            <input type="text" placeholder="Search here..."
                   value="{{ request('search') }}" name="search">
            <button value="search" type="submit"><i class="ti-search"></i></button>
        </form>
    </div>
    <!--/ End Search Form -->
</div>
