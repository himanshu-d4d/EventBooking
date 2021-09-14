<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventGuestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events_booking', function (Blueprint $table) {
            $table->id();
            $table->integer('guest_id');
            $table->foreign('guest_id')->references('id')->on('users');
            $table->integer('event_id');
            $table->foreign('event_id')->references('id')->on('events'); 
            $table->enum('status', ['Remind'=>1, 'Cancel'=>0, 'Completed'=>2]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events_booking');
    }
}
