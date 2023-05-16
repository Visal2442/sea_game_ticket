<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::all();
        return response()->json(["success"=>true, "data"=>$bookings],200);
    }  
   
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $event = Event::find($request["event_id"]);
        $bookings = User::find($request["user_id"])->bookings;

        // Check amount of tickets 
        if($event["number_of_tickets"] <= 0){
            return response()->json(["success"=>false, "message"=>"Tickets are sold out!"], 200);
        }
        // Check whether user has booked the ticket already
        foreach($bookings as $booking){
            if($booking["event_id"]==$request["event_id"]){
                return response()->json(["success"=>false, "message"=>"You have booked the ticket already."], 200);
            }
        };

        // Add booking 
        Booking::create($request->all());
        
        // Update number of tickets in event 
        $event->update([
            "number_of_tickets"=>$event["number_of_tickets"]-1,
        ]);

        return response()->json(["success"=>true, "message"=>"Booking is successful"],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
