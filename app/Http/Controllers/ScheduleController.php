<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = Schedule::all();
        return response()->json(["success"=>true, "data"=>$schedules], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = [
            "date"=>"required",
            "time"=>"required"
        ];
        $validator = Validator::make($request->all(), $validation);
        if($validator->fails()){
            return response()->json(["success"=>false, "message"=> $validator->errors()],200);
        }
        Schedule::create($validator->validated());
        return response()->json(["success"=>true, "message"=>"Create successfully"], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        //
    }
}
