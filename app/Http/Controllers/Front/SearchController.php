<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function index()
    {

        $filter = request(['search']);
        $filter = array_merge($filter, request(['category']));


//        $products = Product::whereHas('categories', function ($query) use ($filter) {
//            $query->when($filter['category'] ?? false, fn($q) => $q
//                ->where('categories.id', $filter['category']));
//        })->whereHas('translation', function ($query) use ($filter) {
//            $query->when($filter['search'] ?? false, fn($q) => $q
//                ->where('name', 'like', '%' . $filter['search'] . '%')
//                ->orWhere('url', 'like', '%' . $filter['search'] . '%')
//                ->orWhere('description', 'like', '%' . $filter['search'] . '%'));
//        })->with('translation')
//            ->paginate(4);

        //fulltext search
        $products = Product::whereHas('categories', function ($query) use ($filter) {
            $query->when($filter['category'] ?? false, fn($q) => $q
                ->where('categories.id', $filter['category']));
        })->whereHas('translation', function ($q) use ($filter) {
            $q->when($filter['search'] ?? false, function ($q) use ($filter) {
                $q->whereRaw(
                    'MATCH(name , url , description) AGAINST (?)', array($filter['search']
                    ))->orwhere('name', 'like', '%' . $filter['search'] . '%')
                    ->orWhere('url', 'like', '%' . $filter['search'] . '%')
                    ->orWhere('description', 'like', '%' . $filter['search'] . '%');
            });
        })->with('translation')
            ->paginate(4);


        return view('frontend.search.search-product')
            ->with('products', $products);
    }
}
