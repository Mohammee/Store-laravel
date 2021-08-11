<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AttributeRequest;
use App\Http\Requests\Admin\AttributeValuesRequest;
use App\Models\Option;
use App\Models\OptionValue;
use Illuminate\Http\Request;

class AttributesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = Option::with(['translation' ,'optionValues.translation'])->get();
//        dd($attributes);
        return  view('backend.attributes.attributes' , compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttributeRequest $request)
    {
        return $this->update($request , new Option());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Option $attribute)
    {
        return view('backend.attributes.values' , compact('attribute'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Option $attribute)
    {
        return view('backend.attributes.edit' , compact('attribute'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AttributeRequest $request, Option $attribute)
    {
        $action = $attribute->exists ? 'update' : 'create';
      $request->persist($attribute);

      return redirect()->route('admin.attributes.index')
          ->with('success_message' , "Attribute $action successfully");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Option $attribute)
    {
       $attribute->delete();

        return redirect()->route('admin.attributes.index')
            ->with('success_message' , "Attribute remove successfully");
    }


    public function storeAttributeValues(AttributeValuesRequest $request)
    {
         $request->persist(new OptionValue());

        return back()->with('success_message' , "Attribute value store successfully");
    }

    public function editAttributeValue(Request $request,OptionValue $value)
    {
        if($request->isMethod('patch'))
        {
            $request->validate([
                'name.*' => 'required|max:255|string|regex:/^[a-zA-Z_\p{Arabic}\p{N} ]+\b/ui'
            ]);

            $value->udaeteOrCreateTranslate([
                'name' => $request->name
            ]);

            return back()->with('success_message' , "Attribute value update successfully");
        }

        return view('backend.attributes.edit-value' ,compact('value'));
    }

    public function destroyValue(OptionValue $value)
    {
        $value->delete();
        return back()->with('success_message' , "Attribute value deleted successfully");
    }
}
