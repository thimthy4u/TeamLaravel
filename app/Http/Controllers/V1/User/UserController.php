<?php

namespace App\Http\Controllers\V1\User;

use App\Http\Controllers\Controller;
use App\Models\Users\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = user::latest();
        $user = $user->where('name','like','%'. $request->name .'%')->paginate($request->perpage);
        return response()->json(
            [
                'date' => new UserController($user),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inputs['uuid'] = Uuid::uuid4();
        $inputs['name'] = $request->name;
        $inputs['email'] = $request->email;
        $inputs['sex'] = $request->sex;
        $inputs['phone']=$request->phone;
        $inputs['password'] =$request->password;

        $user = User::create($inputs);
        if ($user) {
        return response()->json([
            // 'user'=> $user,
            'message'=>'insert successfully'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return new UserSingleResource($user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $inputs['name'] = $request->name;
        $inputs['email'] = $request->email;
        $inputs['sex'] = $request->sex;
        $inputs['phone']=$request->phone;
        if( $user ){
            $user = $user->update($inputs);
            return response()->json([
                'user'=> $user,
                'message'=>'update successfully'
            ]);
        }else{
            return response()->json([
                'message'=>'data not found'
            ]);
        }
    }
    public function updateByUUID(Request $request, $uuid){


        $user = User::where('uuid','=',$uuid)->get()->first();

        // return response()->json([
        //     'data'=>"Ok"
        // ]);

        $inputs['name'] = $request->name;
        $inputs['email'] = $request->email;
        $inputs['sex'] = $request->sex;
        $inputs['phone'] = $request->phone;
        if($user){
            $user->update($inputs);
            return response()->json([
                'message'=>"update by UUID Successfully"
            ]); 
        }else{
            return response()->json([
                'message'=>"data UUID not found"
            ]); 
        }
    }
    public function deleteByUUID(Request $request, $uuid){
        // return "Delete deleteByUUID";
        // return [
        //     'data'=>$user
        // ];
        $user = User::where('uuid','=',$uuid)->get()->first();
        if($user){
            $user->delete();
            return response()->json([
                'message'=>"delete by UUID Successfully"
            ]); 
        }else{
            return response()->json([
                'message'=>"data UUID not found"
            ]); 
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user = $user->delete();
        if($user){
            return response()->json([
                'message'=>"delete Successfully"
            ]); 
        }
    }
}
