<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Booking;
use App\Models\Team;

function getValidation(){
    return [
        "event_name"=>"required|max:100",
        "description"=>"required|max:255",
        "number_of_tickets"=>"required",
        "sport_id"=>"required",
        "location_id"=>"required",
        "schedule_id"=>"required",
        "teams_id"=>"required",
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
        $event = Event::create($validator->validated());
        $event->teams()->sync($request["teams_id"]);
        return response()->json(["success"=>true, "message"=>"Event is created"],200);
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
        if(Event::find($id)!=null){
            $event = Event::with(["teams", "location", "schedule", "sport"])->find($id);
            return response()->json(["success"=>true, "data"=>$event], 200);
        }
        return response()->json(["success"=>false, "message"=>"Event is not found"], 401);
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = getValidation();
        $event = Event::find($id);
        if($event!=null){
            $validator=Validator::make($request->all(), $validation);
            if($validator->fails()){
                return response()->json(["success"=>false, "message"=>$validator->errors()], 200);
            }
            $event->update($validator->validated());
            $event->teams()->sync($request["teams_id"]);
            return response()->json(["success"=>true, "message"=>"Event is updated."], 200);
        }
        return response()->json(["success"=>false, "message"=>"Event is not found"], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $message = "Event with id ".$id. " is not found";
        if(Event::destroy($id)){
            $message = "Event is deleted";
        };
        return response()->json(["success"=>true, "message"=>$message], 200);
    }
}
