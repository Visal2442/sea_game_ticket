<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Booking;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bookings=[
            [
                "zone"=>"A",
                "event_id"=>1,
                "user_id"=>1
            ],
            [
                "zone"=>"A",
                "event_id"=>1,
                "user_id"=>2
            ],
            [
                "zone"=>"A",
                "event_id"=>1,
                "user_id"=>3
            ],
            [
                "zone"=>"A",
                "event_id"=>1,
                "user_id"=>4
            ],
            [
                "zone"=>"A",
                "event_id"=>2,
                "user_id"=>5
            ],
        ];

        foreach($bookings as $booking){
            Booking::create($booking);
        }
    }
}
