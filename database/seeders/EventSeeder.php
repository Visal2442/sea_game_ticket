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
                "event_name"=>"Men's Football U-22",
                "description"=>"CAM vs THA && INA vs PH",
                "teams"=>[
                    "team1"=>"Cambodia",
                    "team2"=>"Indonesia",
                    "team3"=>"Thailand",
                    "team4"=>"Myanmar"
                ],
                "number_of_tickets"=>1,
                "sport_id"=>1,
                "location_id"=>1,
                "schedule_id"=>1,
            ],
            [
                "event_name"=>"Men's Volleyball",
                "description"=>"INA vs CAM",
                "number_of_tickets"=>200,
                "teams"=>[
                    "team1"=>"Cambodia",
                    "team2"=>"Indonesia",
                    "team3"=>"Thailand",
                    "team4"=>"Philippine"
                ],
                "sport_id"=>2,
                "location_id"=>3,
                "schedule_id"=>2,
            ]
        ];
        foreach($events as $event){
            Event::create($event);
        }
    }
}
