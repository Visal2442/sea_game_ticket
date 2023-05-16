<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return response()->json(["success"=>true, "data"=>$users],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = [
            "name"=>"required|min:5",
            "email"=>"required|unique:users",
            "password"=>"required|min:8",
        ];
        $validator=Validator::make($request->all(), $validation);
        if($validator->fails()){
            return response()->json(["success"=>true, "message"=>$validator->errors()], 200);
        }
        User::create($validator->validated());
        return response()->json(["success"=>true, "message"=>"Account is created"], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $user_id)
    {
        $bookings = User::with("bookings")->find($user_id);
        return response()->json(["success"=>true, "data"=>$bookings], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $validation = [
            "name"=>"required|min:5",
            "email"=>"required|unique:users",
            "password"=>"required|min:8",
        ];
        $validator=Validator::make($request->all(), $validation);
        if($validator->fails()){
            return response()->json(["success"=>true, "message"=>$validator->errors()], 200);
        }
        $user->update($validator->validated());
        return response()->json(["success"=>true, "message"=>"Account is updated"], 200);
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        return response()->json(["success"=>true, "message"=>"Account is deleted"], 200);
    }
}
