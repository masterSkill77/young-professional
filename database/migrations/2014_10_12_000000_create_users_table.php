<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('firstname');
            $table->string('lastname' , 255);
            $table->string('email')->unique();
            $table->string('phone_number' , 13)->unique();
            $table->date('birthday');

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            
            // Fonctionnality
            $table->unsignedInteger('establishment');
            $table->foreign('establishment')->references('establishment_id')->on('establishments')->restrictOnDelete()->cascadeOnUpdate();
            
            $table->unsignedInteger('level');
            $table->foreign('level')->references('level_id')->on('levels')->restrictOnDelete()->cascadeOnUpdate();
            
            $table->unsignedInteger('role');
            $table->foreign('role')->references('role_id')->on('roles')->restrictOnDelete()->cascadeOnUpdate();
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
