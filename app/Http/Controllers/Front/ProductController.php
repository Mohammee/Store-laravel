<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Option;
use App\Models\OptionValue;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {

    }

    public function show($url)
    {

        $product = Product::with(['translation' , 'variations' => function($query) {
            $query->orderBy('price');
        }])->filterUrl(['url' => $url])->first();

        abort_if(empty($product), 404);

        $variations = $product->variations;
        if($variations->isNotEmpty())
        {
            $color_ids = $variations->pluck('color_id')->flatten()->unique()->toArray();
            $colors = Color::with('translation')->whereIn('id' , $color_ids)->get();


            $value_ids = $variations->pluck('option_values')->flatten()->unique()->toArray();
            $options = Option::whereHas('optionValues' , function($query) use ($value_ids) {
                $query->whereIn('id' , $value_ids);
            })->with('translation')->get();
        }

        return view('frontend.product.product')
            ->with([
                'product' => $product,
                'options' => $options ?? [],
                'value_ids' => $value_ids ?? [],
                'colors' => $colors ?? [],
            ]);
    }

    public function showProductModel(Request $request, $id)
    {
        if ($request->ajax()) {

            $product = Product::with(['translation' , 'variations' => function ($query) {
                $query->orderBy('price');
            }])->firstWhere('id' , $id);

            if (empty($product)) {
                return response()->json('Error! product not found.', 404);
            }

            $variations = $product->variations;
            if($variations->isNotEmpty())
            {

            $color_ids = $variations->pluck('color_id')->flatten()->unique()->toArray();
            $colors = Color::with('translation')->whereIn('id' , $color_ids)->get();


            $value_ids = $variations->pluck('option_values')->flatten()->unique()->toArray();
            $options = Option::whereHas('optionValues' , function($query) use ($value_ids) {
                $query->whereIn('id' , $value_ids);
            })->with('translation')->get();
            }

            return view('frontend.product.product-model')
                ->with([
                    'product' => $product,
                    'options' => $options ?? [],
                    'value_ids' => $value_ids ?? [],
                    'colors' => $colors ?? [],
                ]);
        }
    }

    public function getVariantPrice(Request $request)
    {
        if ($request->ajax()) {

            $product = Product::find($request->id);

            if (empty($product)) {
                return response()->json(['error' => 'Porduct id not found!'], 404);
            }

//            return json_encode($request->attribute_id);
            $data =  $product->variations()->select('price' , 'stock' , 'option_values' , 'color_id')->get()->where('color_id' , $request->color)
                ->firstWhere('option_values' , $request->attribute_id);

            if (empty($data)) {
                return response()->json(['succuess' => false ], 400);
            }


            return $data;
        }
    }
}
