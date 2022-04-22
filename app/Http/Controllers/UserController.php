<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\CreateUserRequest;
use App\Helpers\{Utility,Reply};
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderby('id', 'DESC')->get();
        return response()->json($users);
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
    public function store(CreateUserRequest $request)
    {
        $data                       = $request->all();
        $data['password']           = Hash::make($request->password);
        if($request->profile_photo_path){
            $image_name = time().'.' . explode('/', explode(':', substr($request->profile_photo_path, 0, strpos($request->profile_photo_path, ';')))[1])[1];
            \Image::make($request->profile_photo_path)->save(public_path('uploads/').$image_name);
            $request->merge(['profile_photo_path' => $image_name]);
        }
        $data['profile_photo_path'] = $image_name;
        $data['current_time']       = date('H:i A');
        
        if (User::create($data)) {
            return response()->json([
                'status' => true,
                'messege' => 'Users created successfully!'
            ]);
        }
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
    public function edit($id)
    {
        $users = User::whereId($id)->first();
        return response()->json($users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateUserRequest $request, $id)
    {
        $data                       = $request->all();
        $userOldImage               = User::whereId($id)->pluck('profile_photo_path')->first();
        if($request->profile_photo_path){
            \File::delete(public_path('uploads/'). $userOldImage);
            $image_name = time().'.' . explode('/', explode(':', substr($request->profile_photo_path, 0, strpos($request->profile_photo_path, ';')))[1])[1];
            \Image::make($request->profile_photo_path)->save(public_path('uploads/').$image_name);
            $request->merge(['profile_photo_path' => $image_name]);
        }else{
           $image_name = $userOldImage; 
        }

        $data['profile_photo_path'] = $image_name;
        $data['current_time']       = date('H:i A');

        if (User::whereId($id)->update($data)) {
            return response()->json([
                'status' => true,
                'messege' => 'Users updated successfully!'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userOldImage = User::whereId($id)->pluck('profile_photo_path')->first();
        if(User::destroy($id)){
            \File::delete(public_path('uploads/'). $userOldImage);
            return response()->json('succeed');
        }
    }
}
