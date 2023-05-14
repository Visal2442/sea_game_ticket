<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Event;

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
    public function bookTicket(Request $request)
    {
        $event = Event::find($request->event_id);
        if($event["number_of_tickets"] <= 0){
            return response()->json(["success"=>false, "message"=>"Tickets are sold out!"], 200);
        }
        // Add booking 
        Booking::create([
            "zone"=>$request->zone,
            "event_id"=>$request->event_id
        ]);
        // Update number of tickets in event 
        $event->update([
            "number_of_tickets"=>$event["number_of_tickets"]-1,
        ]);
        return response()->json(["success"=>true, "message"=>"Booking is successful"],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
