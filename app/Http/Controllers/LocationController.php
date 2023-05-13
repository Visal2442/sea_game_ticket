<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = Location::all();
        return response()->json(["success"=>true, "data"=>$locations], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation =[
            "name"=>"required|unique:locations"
        ];
        $validator = Validator::make($request->all(), $validation);
        if($validator->fails()){
            return response()->json(["success"=>false, "message"=> $validator->errors()],200);
        }
        Location::create($validator->validated());
        return response()->json(["success"=>true, "message"=>"Create successfully"], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $location = Location::find($id);
        return $location;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $location = Location::find($id);
        $validation =[
            "name"=>"required|unique:locations"
        ];
        $validator = Validator::make($request->all(), $validation);
        if($validator->fails()){
            return response()->json(["success"=>false, "message"=> $validator->errors()],200);
        }
        $location->update([
            "name"=>$request->name
        ]);
        return response()->json(["success"=>true, "message"=>"Update successfully"], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Location::destroy($id);
        return response()->json(["success"=>true, "messsage"=>"Delete successfully"],200);
    }
}
