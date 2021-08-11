<?php $hasChildren = count($category->childCategories) > 0 ? true : false; ?>
@if($hasChildren)
    <li class="dropdown-submenu">
        <a href="{{ route('shop.show-category' , $category->url) }}" class="dropdown-item">
            {{ $category->name }}
        </a>

        <ul class="dropdown-menu" tabindex="-1">
            @foreach($category->childCategories as $category)

                @include('frontend.category.navbar-categories' , ['category' => $category])

            @endforeach
        </ul>

    </li>
@else
    <li class="dropdown-item">
        <a href="{{  route('shop.show-category' , $category->url) }}">{{ $category->name }}</a>
    </li>
@endif
