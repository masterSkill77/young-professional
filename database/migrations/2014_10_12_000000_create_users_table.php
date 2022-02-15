<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Rfc4122\UuidV4;

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
            $table->string('phone_number')->unique();
            $table->date('birthday');
            $table->uuid('uuid')->default(UuidV4::uuid4());

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            
            // Fonctionnality
            $table->unsignedInteger('establishment');
            $table->foreign('establishment')->references('establishment_id')->on('establishments')->restrictOnDelete()->cascadeOnUpdate();
            
            $table->unsignedInteger('level');
            $table->foreign('level')->references('level_id')->on('levels')->restrictOnDelete()->cascadeOnUpdate();
            
            $table->integer('role');
            $table->foreign('role')->references('role_id')->on('roles')->restrictOnDelete()->cascadeOnUpdate();
            

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
