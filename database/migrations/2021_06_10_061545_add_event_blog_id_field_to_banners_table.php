<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEventBlogIdFieldToBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('banners', function (Blueprint $table) {
            $table->dropColumn('event_id');
            $table->dropColumn('blog_id');
            $table->bigInteger('event_blog_id');
            $table->string('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('banners', function (Blueprint $table) {
            $table->integer('event_id');
            $table->intdiv('blog_id');
            $table->dropColumn('event_blog_id');
            $table->dropColumn('category');
        });
    }
}
