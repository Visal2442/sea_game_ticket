<?php

namespace Database\Seeders;

use App\Models\EventDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events=[
            [
                "event_id"=>1,
                "team_id"=>1,
            ],
            [
                "event_id"=>1,
                "team_id"=>2,
            ],
            [
                "event_id"=>1,
                "team_id"=>3,
            ],
            [
                "event_id"=>1,
                "team_id"=>4,
            ],
        ];
        foreach($events as $event){
            EventDetail::create($event);
        }
    }
}
