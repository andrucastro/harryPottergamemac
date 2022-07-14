<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWaypointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waypoints', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->longText('content')->nullable();
            $table->string('image')->nullable();
            $table->string('background_image')->nullable();
            $table->boolean('default')->default(false);
            $table->string('code')->nullable();
            $table->integer('point_value')->default(0);
            $table->timestamps();
        });

        Schema::create('user_waypoint', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('waypoint_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('waypoint_id')
                ->references('id')
                ->on('waypoints')
                ->onDelete('cascade');
            $table->primary(['user_id', 'waypoint_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_waypoint');
        Schema::dropIfExists('waypoints');
    }
}
