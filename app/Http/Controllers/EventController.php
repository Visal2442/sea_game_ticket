<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Booking;

function getValidation(){
    return [
        "event_name"=>"required|max:100",
        "description"=>"required|max:255",
        "number_of_tickets"=>"required",
        "teams"=>"required",
        "sport_id"=>"required",
        "location_id"=>"required",
        "schedule_id"=>"required",
    ];
}

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        return response()->json(["success"=>true, "data"=>$events],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {  
        $validation = getValidation();
        $validator = Validator::make($request->all(), $validation);

        if($validator->fails()){
            return response()->json(["success"=>false, "message"=>$validator->errors()], 200);
        }
        Event::create($validator->validated());
        return response()->json(["success"=>true, "message"=>"Create successfully"],200);
    }

     /**
     * Display event detail.
     */
    public function searchEvent(string $event_name)
    {
        $event = Event::where("event_name", "like", "%".$event_name."%")->get();
        return response()->json(["success"=>true, "data"=>$event], 200);
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::find($id);
        return response()->json(["success"=>true, "data"=>$event], 200);
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = getValidation();
        $event = Event::find($id);
        $validator=Validator::make($request->all(), $validation);
        if($validator->fails()){
            return response()->json(["success"=>false, "message"=>$validator->errors()], 200);
        }
        $event->update([
            "event_name"=>$request->event_name,
            "description"=>$request->description,
            "number_of_tickets"=>$request->number_of_tickets,
            "sport_id"=>$request->sport_id,
            "location_id"=>$request->location_id,
            "team_id"=>$request->team_id,
            "schedule_id"=>$request->schedule_id,
        ]);
        return response()->json(["success"=>true, "message"=>"Update successfully"], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Event::destroy($id);
        return response()->json(["success"=>true, "message"=>"Delete successfully"], 200);
    }
}
