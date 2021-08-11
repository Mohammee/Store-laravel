<?php $hasChildren = count($child->childCategories) > 0 ? true : false; ?>
<li {{ $hasChildren ? 'class=sub-category' . '  record_id=' . $child->id   : '' }}>
    {!! $hasChildren ? ' <i class="fa fa-arrow-right"></i>' : ''   !!}
    <a href="">
        {{ $child->name }} ({{ $child->products_count }})
    </a>
</li>
@if(count($child->childCategories) > 0)
    <div class="sub-category-{{ $child->id }} ml-2" style="display: none">
        <ul>
            @foreach($child->childCategories as $child)
                @include('frontend.category.subcategories' , ['$child' => $child])
            @endforeach
        </ul>
    </div>
@endif

