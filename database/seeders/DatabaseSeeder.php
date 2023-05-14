<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Location;
use App\Models\Schedule;
use App\Models\Sport;
use App\Models\Team;
use App\Models\Event;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // To run factory ==============
        // Location::factory(10)->create();
        // Schedule::factory(10)->create();
        // Sport::factory(10)->create();
        // Team::factory(10)->create();
        // Event::factory(10)->create();

        // To run seeder ===============
        $this->call(LocationSeeder::class);
        $this->call(ScheduleSeeder::class);
        $this->call(SportSeeder::class);
        $this->call(TeamSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(BookingSeeder::class);
    }
}
