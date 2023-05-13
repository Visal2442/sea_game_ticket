<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events =[
            [
                "event_name"=>"Football",
                "description"=>"Men's football U-22",
                "number_of_tickets"=>20000,
                "sport_id"=>1,
                "location_id"=>1,
                "team_id"=>1,
                "schedule_id"=>1,
            ]
        ];
        foreach($events as $event){
            Event::create($event);
        }
    }
}
