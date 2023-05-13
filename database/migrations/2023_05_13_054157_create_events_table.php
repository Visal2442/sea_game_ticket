<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string("event_name");
            $table->string("description");
            $table->integer("number_of_tickets");
            $table->foreignId("sport_id")->constrained(table:"sports")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("location_id")->constrained(table:"locations")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("team_id")->constrained(table:"teams")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("schedule_id")->constrained(table:"schedules")->onDelete("cascade")->onUpdate("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
