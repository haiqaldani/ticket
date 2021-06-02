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
            $table->bigIncrements('id');
            $table->text('banner');
            $table->string('title');
            $table->string('category_event');
            $table->integer('ticket_id');
            $table->longText('description');
            $table->string('venue_name')->nullable();
            $table->text('address')->nullable();
            $table->enum('event_type', ['Online', 'Offline']);
            $table->string('city')->nullable();
            $table->string('slug'); 
            $table->string('link')->nullable();
            $table->longText('term_and_conditions');
            $table->timestamps();
            $table->softDeletes();

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
