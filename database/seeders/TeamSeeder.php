<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Team;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teams =[
            [
                "country"=>"Cambodia"
            ],
            [
                "country"=>"Thailand"
            ],
            [
                "country"=>"Vietnam"
            ],
            [
                "country"=>"Indonesia"
            ],
            [
                "country"=>"Lao"
            ],
            [
                "country"=>"Malaysia"
            ],
            [
                "country"=>"Myanmar"
            ],
            [
                "country"=>"Singapore"
            ],
        ];

        foreach($teams as $team){
            Team::create($team);
        }
    }
}
