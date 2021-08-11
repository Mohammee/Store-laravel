<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUpdateCategoryRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        session()->put('page', 'store');

        $categories = Category::withCount('products')
            ->with([
                'parentCategory.translation',
                'translation'
            ]);

        //you must know that request->has('name') return ture always
        $categories->filterName(request()->only('name'));

        $categories->filter(request(['status']));

//         echo '<pre>' ; print_r(json_decode(json_encode($categories->get()), true)); die;

        return view('backend.categories.categories')
            ->with('categories', $categories->paginate(6));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->edit(new Category());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\StoreUpdateCategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateCategoryRequest $request)
    {
        return $this->update($request, new Category());
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
    public function edit(Category $category)
    {

//       getLocal() helpers method
        $categories = Category::with(['translation', 'parentCategory.translation'])->get();


//        dd($data_ar,$data_en);
//        $categories = json_decode(json_encode($categories), true);
//       echo '<pre>'; print_r($categories); die;

        return view('backend.categories.add_edit', compact(
            'categories',
            'category'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\StoreUpdateCategoryRequest $request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateCategoryRequest $request, Category $category)
    {

        $action = $category->exists ? 'Update' : 'Create new';

        $request->presist($category);

        return redirect()->route('admin.categories.index')
            ->with('success_message', "Succeessfully $action category! ");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Category::where('parent_id', $category->id)
            ->update(['parent_id' => 0]);

        $category->delete();

        return back()->with('success_message', "Category Delete With Translate Successfully.");
    }


    public function updateCategoryStatus(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'status' => 'required|numeric|in:0,1',
                'id' => 'required|numeric|exists:App\Models\Category,id'
            ]);

            if ($validator->fails()) {
                return response()->json('Error!', 400);
            }

            $status = $request->status ? 0 : 1;

            Category::find($request->id)->update(['status' => $status]);

            return response()->json([
                'status' => $status,
                'category_id' => $request->id
            ]);
        }

        return response()->json('Error!', 400);
    }


    public function deleteCategoryImage(Category $category)
    {
        $image = $category->image;
        $image_path = public_path() . DIRECTORY_SEPARATOR . $image;

        if (file_exists($image_path)) {
//            File::delete($image_path);
            unlink($image_path);
        }

        $category->setAttribute('image', null)->save();

        return back()->with('success_message', 'Category Image remove successfully!');
    }


}


