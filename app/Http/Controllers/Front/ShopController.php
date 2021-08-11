<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\CategoryPorduct;
use App\Models\Language;
use App\Models\Product;
use App\Models\Translation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use function Sodium\add;

class ShopController extends Controller
{


    public function category(Request $request, $url)
    {


        $category = Category::filterUrl(['url' => $url])
            ->with([
                'translation',
                'childCategories.translation',
                'childCategories.childCategories.translation',
                'childCategories.childCategories.childCategories.translation'
            ])->first();


        abort_if(empty($category), 404, 'Not Found');


        $products = $category->products()->with('translation');
        $products_id = $products->get()->pluck('id')->toArray();

        $brands = Brand::whereHas('products', function ($query) use ($products_id) {
            $query->whereIn('products.id', $products_id);
        })->with('translation')->get();

        $products = $this->filterProduct($request, $products)->paginate(2);
//        dd($products->items());

        return view('frontend.shop.shop')
            ->with([
                'products' => $products,
//                'categories' => $categories,
                'category' => $category,
                'brands' => $brands,
            ]);


    }


    public function filter(Request $request, $url)
    {
        if ($request->ajax()) {
            $category = Category::filterUrl(['url' => $url])->first();

            if (empty($category)) {
                return response()->json(['error'], 400);
            }

            $products = $category->products()->with('translation');

            $products = $this->filterProduct($request, $products)->paginate(2);


            return view('frontend.shop.filter-products', compact('products'));
        }
    }

    public function loadMore(Request $request, $url)
    {
        if ($request->ajax()) {
            $category = Category::filterUrl($request->only('url'))->first();

            if (empty($category)) {
                return response()->json(['error'], 400);
            }

            $products = $category->products()->with('translation');
            $products = $this->filterProduct($request, $products)->paginate(2);

            if (!($products->count() > 0)) {
                return '';
            }

            return view('frontend.shop.load-more', compact('products'));
        }
    }

    public function allCategories()
    {
        $allCategories = Category::with('translation')->get();
        return view('frontend.shop.categories', compact('allCategories'));
    }

    public function brand($url)
    {

    }

    public function allBrands()
    {
        $allBrands = Brand::with('translation')->get();
        return view('frontend.shop.brands', compact('allBrands'));
    }

    public function filterProduct($request, $products)
    {
        if ($request->filled('categories')) {
            $categories = $request->categories;
            $products->whereHas('categories', function ($query) use ($categories) {
                $query->whereIn('categories.id', $categories);
            });
        }

        if ($request->filled('brands')) {
            $brands = $request->brands;
            $products->whereHas('brands', function ($query) use ($brands) {
                $query->whereIn('brands.id', $brands);
            });
        }

        if ($request->filled('price')) {
            $price = explode('-', $request->price);
            $products->whereBetween('price', [$price[0], $price[1]]);
        }

        if ($request->filled('sortBy')) {
            if ($request->get('sortBy') == 'oldest') {
                $products->orderBy('id');
            } elseif ($request->get('sortBy') == 'high_price') {
                $products->orderByDesc('price');
            } elseif ($request->get('sortBy') == 'lower_price') {
              $products->orderBy('price');
            } else {
                $products->orderByDesc('id');
            }
        } else {
            $products->orderByDesc('id');
        }

        return $products;
    }
}
