<div class="form-group row mx-auto last">
    <label for="parent_id"
           class="col-2 label-control">Category Level</label>
    <div class="col-10">
        <select name="parent_id" id="parent_id"
                class="form-control select2">
            {{--            i make the value "" its mean null so in laravel validation nulldabel--}}
            <option {{ $category->parent_id == 0 ? 'selected' :'' }} value="">No Parent</option>
            @if(! empty($categories))
                @foreach($categories as $item)
                    <option
                        {{ $category->parent_id ==  $item->id  ? 'selected' : '' }} value="{{ $item->id }}">
                        @foreach($item->level() as $level)
                            @if(! $loop->last)
                                {{ $level }} &raquo;
                            @else
                                {{ $level }}
                            @endif
                        @endforeach
                    </option>
                @endforeach
            @endif
        </select>
    </div>
</div>
