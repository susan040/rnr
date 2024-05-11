<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use App\Helpers\ImageHelper;

use App\Http\Controllers\BaseController;

class ProfileController extends BaseController
{

    public function __construct()
    {
        $this->title = 'Profile';
        $this->resources = 'vendors.profile.';
        parent::__construct();
        $this->route = 'vendor.profile.';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = $this->crudInfo();
        $data['hideCreate'] = true;
        $data['item'] = User::findOrFail(auth()->user()->id);
        return view($this->indexResource(), $data);
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
    public function store(Request $request, User $user)
    {
        //

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
        return redirect()->route($this->indexRoute())->with('success', 'Vehicle Edited successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = $this->crudInfo();
        $data['item'] = User::findOrFail($id);
        // dd($data['item']);
        return view($this->editResource(), $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'email' => 'required | unique:users,email,' . auth()->id(),
            'profile_image' => 'mimes:jpeg,jpg,png|max:10000',

        ]);
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->phone_number = $request->input('phone_number');
        $user->email = $request->input('email');
        // $user->shop_address = $request->input('shop_address');

        if ($request->hasFile('profile_image') && $request->profile_image != '') {
            ImageHelper::deleteImage($user->profile_image);
            $file = $request->file('profile_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $filename = ImageHelper::saveImage($file, '/users/profile-images', $filename);
            $user->profile_image = $filename;
        }

        $user->update();

        return redirect()->route($this->indexRoute())->with('success', 'Profile Edited successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        ImageHelper::deleteImage($user->profile_image);
        $user->delete();

        return redirect()->route('login');
    }
}
