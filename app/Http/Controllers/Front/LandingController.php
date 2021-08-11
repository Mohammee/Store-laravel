<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class LandingController extends Controller
{

    public function index()
    {
        $featured_products = Product::where('featured' , 1)
            ->with('translation')
            ->take(8)
            ->inRandomOrder()
            ->get();

        $new_products = Product::orderByDesc('id')
            ->with('translation')
            ->paginate(4);

        $brands = Brand::with('translation')->take(4)->inRandomOrder()->get();

        $banners = Banner::where('status' , 1)->orderBy('position')->with('translation')->get();

//        dd(divideText($banners[0]->description));

        $landing_categories = Category::where('show_in_main' , 1)->with('translation')->get();

        return view('frontend.landing.home')
            ->with([
                'new_products' => $new_products,
                'brands' => $brands,
                'landing_categories' => $landing_categories,
                'featured_products' => $featured_products,
                'banners' => $banners
            ]);
    }

    public function loadMoreNewProducts(Request $request)
    {
        if($request->ajax())
        {
            $new_products = Product::where('featured' , 1)
                ->with('translation')
                ->paginate(4);


            if(! ($new_products->count() > 0))
            {
                return '';
            }

            return view('frontend.landing.load-more-new', compact('new_products'));
        }
    }
}
