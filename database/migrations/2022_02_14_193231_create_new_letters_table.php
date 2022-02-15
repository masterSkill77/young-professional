<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewLettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_letters', function (Blueprint $table) {
            $table->integerIncrements('new_id');
            $table->string('new_title');
            $table->text('new_content');
            $table->timestamps();
            $table->unsignedBigInteger('author');
            $table->foreign('author')->references('id')->on('users')->restrictOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('new_letters');
    }
}
