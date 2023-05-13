<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Schedule;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schedules =[
            [
                "date"=>"2023-05-15",
                "time"=>"19:30:00"
            ],
            [
                "date"=>"2023-05-16",
                "time"=>"19:00:00"
            ],
            [
                "date"=>"2023-05-17",
                "time"=>"17:00:00"
            ],
        ];
        foreach($schedules as $schedule){
            Schedule::create($schedule);
        }
    }
}
