<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreModeratorsRequest;
use App\Models\Admin;
use App\Models\Product;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session()->put('page', 'moderators');

        $moderators = Admin::with('role')->get();
        return view('backend.admins.admins')
            ->with('moderators', $moderators);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('backend.admins.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreModeratorsRequest $request)
    {

        $status = $request->has('status') ? 1 : 0;

        $admin = Admin::create(
            array_merge($request->all(), [
                'status' => $status,
                'lastActivity' => now()
            ])
        );

        return redirect()->route('admin.moderators.index')
            ->with('success_message', "New moderator $admin->name created succesfully.");
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
     * @param App\Models\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $moderator)
    {
        return view('backend.admins.edit')
            ->with([
                'admin' => $moderator,
                'roles' => Role::all()
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $moderator)
    {

        $validateData = $request->validate(
            array_merge($this->validateData($moderator->id),
                ['role_id' => 'required|exists:App\Models\Role,id',])
        );

        $fillData = [
            'name' => $validateData['name'],
            'mobile' => $validateData['mobile'],
            'email' => $validateData['email'],
            'role_id' => $validateData['role_id'],
            'status' => $request->has('status') ? 1 : 0
        ];

        $withPwd = '';
        if ($request->filled('new_password')) {
            $withPwd = 'with password';
            $fillData = array_merge($fillData, ['password' => bcrypt($validateData['new_password'])]);

        }

        $moderator->fill($fillData)->save();
        return back()->with('success_message', "Moderator $withPwd update successfully.");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $moderator)
    {

        $moderator->delete();
        return back()->with('success_message', "Moderator Delete Successfully.");
    }

    public function profile(Request $request)
    {

        if ($request->isMethod('PATCH')) {
            $admin = Auth::guard('admin')->user();

            $validateData = $request->validate(
                array_merge($this->validateData($admin->id), [
                    'avatar' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                    , 'password' => 'sometimes|string|nullable'
                ])
            );

            $fillData = ['name' => $validateData['name'],
                'mobile' => $validateData['mobile'],
                'email' => $validateData['email']
            ];

            $withPwd = '';
            if ($request->filled('password')) {

                if (Hash::check($validateData['password'], $admin->password)) {
                    if ($request->filled('new_password')) {
                        $withPwd = 'with Password';
                        $fillData = array_merge($fillData, ['password' => bcrypt($validateData['new_password'])]);
                    }
                } else {
                    return back()->withErrors('Current Password is incorrect!');
                }
            }

            if ($request->hasFile('avatar')) {
                $avatar = $request->file('avatar');
                if ($avatar->isValid()) {

                    $avatarPath = uploadImage($avatar, 'admin_avatar');
                    $fillData = array_merge($fillData, ['avatar' => $avatarPath]);
                }
            }


            $admin->fill($fillData)->save();

            return back()->with('success_message', "Profile $withPwd update successfully.");
        }

        return view('backend.admins.admin_profile')
            ->with('admin', Auth::guard('admin')->user());
    }

    public function checkCurrentPassword(Request $request)
    {
        $password = Auth::guard('admin')->user()->password;

        $bool = Hash::check($request->current_pwd, $password);

        return response()->json(['success' => $bool]);
    }

    public function updateModeratorStatus(Request $request)
    {
        if ($request->id == auth('admin')->id()) {
            return ['error' => 'We coun\'t do it'];
        }

        if ($request->ajax()) {

            $validator = Validator::make($request->all(),
                ['status' => 'required|numeric|in:0,1',
                    'id' => 'required|numeric|exists:App\Models\Admin,id'
                ]);

            if ($validator->fails()) {
                return response()->json("Error! Validator Fials. {$validator->errors()}  status =  {$request->status}  id = {$request->id}", 400);
            }

            $status = $request->status;
            $status = $status ? 0 : 1;


            Admin::find($request->id)->update(['status' => $status]);

            return response()->json(['status' => $status,
                'moderator_id' => $request->id]);
        }
        return response()->json('Error!', 400);
    }


    protected function validateData($id)
    {
        return [
            'name' => ['required', 'regex:/([a-zA-Z_]+) ?(\d|[a-zA-Z_])*/', 'string', 'min:3', 'max:255'],
            'new_password' => 'sometimes|string|nullable|confirmed|min:6',
            'email' => ['required', 'email', 'string', 'max:255', 'unique:admins,email,' . $id],
            'mobile' => ['required', 'numeric', 'unique:admins,mobile,' . $id],
        ];
    }
}
