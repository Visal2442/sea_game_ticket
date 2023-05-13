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
                "number_of_tickets"=>20000,
                "sport_id"=>1,
                "location_id"=>1,
                "team_id"=>1,
                "schedule_id"=>1,
            ],
            [
                "event_name"=>"Men's Volleybal",
                "description"=>"INA vs CAM",
                "number_of_tickets"=>200,
                "sport_id"=>2,
                "location_id"=>3,
                "team_id"=>1,
                "schedule_id"=>2,
            ]
        ];
        foreach($events as $event){
            Event::create($event);
        }
    }
}
