<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserStick extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_stick',function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('stick_id');
            $table->timestamps();
            $table->timestamp('start_time')->default(\Carbon\Carbon::now());
            $table->timestamp('end_time')->default(\Carbon\Carbon::now());

             $table->text('start_location');
            $table->text('end_location');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
