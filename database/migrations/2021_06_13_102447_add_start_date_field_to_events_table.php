<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStartDateFieldToEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->date('start_on_date');
            $table->date('until_date')->nullable();
            $table->time('start_at');
            $table->time('until_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('start_on_date');
            $table->dropColumn('until_date');
            $table->dropColumn('start_at');
            $table->dropColumn('until_time');
        });
    }
}
