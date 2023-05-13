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
                "name"=>"Cambodia"
            ],
            [
                "name"=>"Thailand"
            ],
            [
                "name"=>"Vietname"
            ],
            [
                "name"=>"Indonesia"
            ],
            [
                "name"=>"Lao"
            ],
            [
                "name"=>"Myanmar"
            ],
            [
                "name"=>"Timor"
            ],
            [
                "name"=>"Singapore"
            ],
            [
                "name"=>"Bruine"
            ],
        ];
        foreach($teams as $team){
            Team::create($team);
        }
    }
}
