<?php

namespace App\Http\Controllers\V1\Role;

use App\Http\Controllers\Controller;
use App\Models\Role\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {
        $data = Role::latest();
        $role = $data->paginate($req->per_page);

        return response()->json([
            'data'=>'test'
        ]);
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
        try{
            $inputs['name']=$request->name;
            $inputs['code']=$request->code;
            $inputs['description']=$request->description;
            $inputs['status']=$request->status;
            $role = role::create($inputs);

            if($role){
                return response()->json([
                    'data'=>$role,
                    'message'=>'Insert Successfully!'
                ]);
            }

        }catch(\Throwable $th){
            return $th->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //
    }
}