<table
    class="table table-bordered aiz-table footable footable-7 breakpoint breakpoint-lg"
    style="">
    <thead>
    <tr class="footable-header">


        <td class="text-center footable-first-visible"
            style="display: table-cell;">
            Variant
        </td>
        <td class="text-center" style="display: table-cell;">
            Variant Price
        </td>
        <td class="text-center" data-breakpoints="lg"
            style="display: none;">
            SKU
        </td>
        <td class="text-center" data-breakpoints="lg"
            style="display: none;">
            Quantity
        </td>
        <td class="text-center" data-breakpoints="lg"
            style="display: none;">
            Photo
        </td>
        <td class="footable-last-visible"
            style="display: table-cell;"></td>
    </tr>
    </thead>
    <tbody>
<?php $i = 200; ?>
    @foreach($variantions as $variant)

    <tr class="variant" data-expanded="true">


        <td class="footable-first-visible" style="display: table-cell;">
            <span class="footable-toggle fooicon "></span>
            <label for="" class="control-label">{{ $variant['name'] }}</label>
            <input type="hidden" name="variations[{{ $i }}][color_id]"
                   value="{{ $variant['color_id'] ?? null}}">
            <input type="hidden" name="variations[{{ $i }}][option_values]"
                   value="{{ $variant['option_values'] ?? null }}">

        </td>
        <td style="display: table-cell;">
            <input type="number" lang="en" name="variations[{{ $i }}][price]"
                   value="0" min="0" step="0.01" class="form-control"
                   required="">
        </td>
        <td class="footable-last-visible" style="display: table-cell;">
            <button type="button" class="btn btn-icon btn-sm btn-danger"
                    onclick="delete_variant(this , {{ $i }})"><i
                    class="la la-trash"></i></button>
        </td>
    </tr>
    <tr class="footable-detail-row-{{ $i }}">
        <td colspan="3">
            <table
                class="footable-details table table-bordered aiz-table">
                <tbody>
                <tr class="variant">
                    <th>
                        SKU
                    </th>
                    <td style="display: table-cell;">
                        <input type="text" name="variations[{{ $i }}][sku]"
                               value="" class="form-control">
                    </td>
                </tr>
                <tr class="variant">
                    <th>
                        Quantity
                    </th>
                    <td style="display: table-cell;">
                        <input type="number" lang="en"
                               name="variations[{{ $i }}][stock]" value="10"
                               min="0" step="1" class="form-control"
                               required="">
                    </td>
                </tr>
                <tr class="variant">
                    <th>
                        Photo
                    </th>
                    <td style="display: table-cell;">
                        <div class=" input-group "
                             data-toggle="aizuploader"
                             data-type="image">
                            <div class="input-group-prepend">
                                <div
                                    class="input-group-text bg-soft-secondary font-weight-medium">
                                    Browse
                                </div>
                            </div>
                            <div
                                class="form-control file-amount text-truncate">
                                Choose file
                            </div>
                            <input type="hidden"
                                   name="img_AntiqueWhite-XL"
                                   class="selected-files">
                        </div>
                        <div class="file-preview box sm"></div>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>

        <?php $i++; ?>

@endforeach
    </tbody>
</table>
