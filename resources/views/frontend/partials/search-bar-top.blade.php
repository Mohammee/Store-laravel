<div class="search-bar-top">
    <form method="GET" action="{{ route('shop.search') }}">

        <div class="search-bar">

            <select name="category">
                <option selected="selected" value="">All Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ request('category') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            <input name="search" class="form-control"
                   value="{{ request('search') }}" placeholder="Search Products Here....." type="search">
            <button class="btnn" type="submit"><i class="ti-search"></i></button>

        </div>
    </form>
</div>
