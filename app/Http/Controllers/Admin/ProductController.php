<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Option;
use App\Models\OptionValue;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\True_;
use function Sodium\add;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with([
            'translation', 'categories.translation'
        ])->paginate(6);

        return view('backend.products.products')
            ->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::with('translation')->get();
        $brands = Brand::with('translation')->get();
        $colors = Color::with('translation')->get();
        $options = Option::with('translation')->get();

        return view('backend.products.add')
            ->with([
                'categories' => $categories,
                'brands' => $brands,
                'colors' => $colors,
                'options' => $options
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $request->presist(new Product());

        return redirect()->route('admin.products.index')
            ->with('success_message', 'Product Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {

//        dd($product->options);
        $categories = Category::with('translation')->get();
        $product_categories_id = $product->categories->pluck('id')->toArray();

        $brands = Brand::with('translation')->get();
        $product_brands_id = $product->brands->pluck('id')->toArray();

        $colors = Color::with('translation')->get();
        $options = Option::with('translation')->get();

        $variations = $product->variations;

        if($variations->isNotEmpty())
        {
        $variation_colors = $variations->pluck('color_id')->toArray();
        $value_ids = $variations->pluck('option_values')->unique()->flatten()->toArray();
        $attributes = Option::whereHas('optionValues' , function($query) use ($value_ids) {
            $query->whereIn('id' , $value_ids);
        })->with(['translation' , 'optionValues'])->get();
        }

//        dd($value_ids);

        $product = json_decode(json_encode(Product::with('translations')->firstWhere('id' , $product->id)) , true);
//        dd($product);
        return view('backend.products.edit')
            ->with([
                'product' => $product,
                'categories' => $categories,
                'product_categories_id' => $product_categories_id,
                'brands' => $brands,
                'product_brands_id' => $product_brands_id,
                'colors' => $colors,
                'options' => $options,
                'variations' => $variations,
                'variation_colors' => $variation_colors ?? [],
                'attributes' => $attributes ?? [] ,
                'value_ids' => $value_ids ?? []
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $request->presist($product);

        return redirect()->route('admin.products.index')
            ->with('success_message', 'Product Update Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function updatePorductStatus(Request $request)
    {

        if ($request->ajax()) {

            $validator = Validator::make($request->all(), [
                'status' => 'required|numeric|in:0,1',
                'id' => 'required|numeric|exists:App\Models\Product,id'
            ]);

            if ($validator->fails()) {
                return response()->json(
                    "Error! Validator Fials. {$validator->errors()}  status =  {$request->status}  id = {$request->id}",
                    400);
            }

            $status = $request->status ? 0 : 1;
            Product::find($request->id)->setAttribute('status', $status)->save();

            return response()->json([
                'status' => $status,
                'product_id' => $request->id
            ]);
        }

        return response()->json(['Errors!'], 400);
    }

    public function addMoreOptionChoice(Request $request)
    {
        if ($request->ajax()) {
            $attribute_id = $request->attribute_id;
            $values = Option::firstWhere('id', $attribute_id)->optionValues()->with('translation')->get();

            $html = '';
            foreach ($values as $value) {
                $html .= '<option value="' . $value->id . '">' . $value->name . '</option>';
            }

            return $html;
        }

        return response()->json('Errors!', 400);
    }

    public function skuCombination(Request $request)
    {
//        return 'hhhh';
        $variantions = [];

        if ($request->filled('colors') && $request->filled('choice_attributes')
            || $request->filled('choice_attributes')) {

            $options = [];
            $attributes = $request->choice_attributes;

            $attributes = collect($attributes)->filter(function ($item) use ($request) {
                return $request->filled('choice_options_' . $item);
            })->values()->toArray();

            $length = count($attributes);

            if ($length == 0 && $request->isNotFilled('colors')) {
                return null;
            } elseif ($length == 0 && $request->filled('colors')) {

                foreach ($request->colors as $color) {
                    $color = Color::find($color);

                    if (empty($color)) {
                        return response()->json('Not Found', 404);
                    }

                    $variantions[] = ['color_id' => $color->id, 'name' => optional($color)->name];
                }

                return view('backend.products.variante', compact('variantions'));
            }


            if ($length == 1) {
                $variantions = [];
                foreach ($request->{'choice_options_' . $attributes[0]} as $value) {
                    if ($request->filled('colors')) {
                        foreach ($request->colors as $color) {
                            $variantions[] = ['option_values' => $value, 'color_id' => $color, 'name' => Color::find($color)->name . '-' . OptionValue::find($value)->name];

                        }
                    } else {
                        $variantions[] = ['option_values' => $value, 'name' => OptionValue::find($value)->name];

                    }
                }

                return view('backend.products.variante', compact('variantions'));
            }

            for ($i = 0; $i < $length - 1; $i++) {

                foreach ($request->{'choice_options_' . $attributes[$i]} as $value1) {
                    foreach ($request->{'choice_options_' . $attributes[$i + 1]} as $value2) {
                        $options[] = $value1 . '-' . $value2;
                    }
                }
                $request->merge(['choice_options_' . $attributes[$i + 1] => $options]);
                if ($i + 1 != $length - 1) {
                    $options = [];
                }
            }

            $variantions = [];
            foreach ($options as $option) {

                $values = explode('-', $option);
                $names = '';
                foreach ($values as $value) {
                    $name = OptionValue::find($value)->name;
                    $names .= $name . '-';
                }

                $variantions[] = ['option_values' => $option, 'name' => trim($names, '-')];

            }


            if ($request->filled('colors')) {
                $results = [];
                foreach ($variantions as $variantion) {
                    foreach ($request->colors as $color) {
                        $results[] = ['option_values' => $variantion['option_values'] , 'color_id' => $color , 'name' => Color::find($color)->name . '-' . $variantion['name']];
                    }
                }
                 $variantions = $results;
            }


        } elseif ($request->filled('colors')) {
            foreach ($request->colors as $color) {
                $color = Color::find($color);
                if (empty($color)) {
                    return response()->json('Not Found', 404);
                }
                $variantions[] = ['color_id' => $color->id, 'name' => optional($color)->name];
            }

        } else {
            return null;
        }

        return view('backend.products.variante', compact('variantions'));
    }


}


