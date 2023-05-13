<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sport;

class SportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sports =[
            [
                "name"=>"Football"
            ],
            [
                "name"=>"Volleyball"
            ],
            [
                "name"=>"Basketball"
            ],
            [
                "name"=>"Swimming"
            ],
            [
                "name"=>"Badminton"
            ],
            [
                "name"=>"Mobile Legend"
            ],
            [
                "name"=>"Snooker"
            ],
        ];
        foreach($sports as $sport){
            Sport::create($sport);
        }
    }
}
