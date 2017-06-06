<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSticksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sticks', function (Blueprint $table) {
            $table->increments('id');
            $table->String('status')->default('T');
            $table->text('location');
            $table->integer('use_count')->default(0);
            $table->timestamps();
        });
        Schema::create('user_stick',function (Blueprint $table)
        {
           $table->increments('id');
           $table->integer('user_id');
           $table->integer('stick_id');
           $table->timestamp('start_time')->nullable();
           $table->timestamp('end_time')->nullable();
           $table->text('start_location');
           $table->text('end_location');
           $table->string('track');
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
        Schema::dropIfExists('sticks');
        Schema::dropIfExists('user_stick');
    }
}
