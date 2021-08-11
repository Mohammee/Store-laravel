<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $banners = Banner::with('translation')->paginate(2);

      return view('backend.banners.banners', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->edit(new Banner());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        return $this->update($request , new Banner() );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('backend.banners.add_edit' , compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BannerRequest $request, Banner $banner)
    {
        $action = $banner->exists ? 'updated' : 'created';
        $request->presist($banner);

        return redirect()
            ->route('admin.banners.index')
            ->with('success_message' , "Banner $action successfully.");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        return back()->with('success_message', "Banner Delete With Translate Successfully.");
    }


    public function updateBannerStatus(Request $request)
    {

        if($request->ajax())
        {

            $validator = Validator::make($request->all() , [
                'status'  => 'required|numeric|in:0,1',
                'id' => 'required|numeric|exists:App\Models\Banner,id'
            ]);

            if($validator->fails())
            {
                return response()->json( ["Error! Validator Fials." => " {$validator->errors()}  status =  {$request->status}  id = {$request->id}"], 400);
            }

            $status = $request->status ? 0 : 1;
            Banner::find($request->id)->setAttribute('status' , $status)->save();

            return  response()->json(['status' => $status ,
                'banner_id' => $request->id]);
        }

        return response()->json(['Errors!'] , 400);
    }
}
