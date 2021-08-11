<?php $childCategories = $child->childCategories; ?>
<?php $hasChildren = count($childCategories) > 0 ? true : false; ?>

<li>
    <label>
        <input type="checkbox"    {{ request()->filled('categories') &&  in_array($child->id ,request('categories')) ? 'checked' : '' }}
               class="changeable" value="{{ $child->id }}" name="categories[]">
        <span style="margin-left:10px;margin-right:10px;">{{ $child->name . " ($child->products_count)" }}</span>
    </label>
</li>

@if($hasChildren)
    <ul class="ml-2">
        @foreach($childCategories as $child)
            @include('frontend.category.children' , ['child' => $child])
        @endforeach
    </ul>
@endif

