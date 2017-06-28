<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer("use_count")->default(0);
            $table->text("location")->nullable();
            $table->enum('role',['user','guardian','admin']);
            $table->char('idcard',18)->unique();
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('user_relation',function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('guardian_id');
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
        Schema::dropIfExists('users');
    }
}
