<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('creator_name');
            $table->string('ename');
            $table->string('eaddress');
            $table->intiger('eprice');
            $table->string('description');
            $table->date('date')->format('Y-m-d H:i:s');;
            $table->string('eimage');
            $table->tinyint('is_attend');
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
        Schema::dropIfExists('events');
    }
}
