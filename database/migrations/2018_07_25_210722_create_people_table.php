<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dpi',13)->unique();
            $table->string('first_name', 45);
            $table->string('second_name', 45)->nullable();
            $table->string('third_name', 45)->nullable();
            $table->string('first_surname', 45);
            $table->string('second_surname', 45)->nullable();
            $table->string('email',60)->unique()->nullable();
            $table->string('phone', 8)->nullable();
            $table->string('address', 150);
            $table->integer('municipality_id')->unsigned();
            $table->integer('gender_id')->unsigned();
            $table->date('birthdate');
            $table->integer('civil_state_id')->unsigned();
            $table->timestamps();

            /**
             * *Area de las Llaves foraneas
             */
            $table->foreign('civil_state_id')->references('id')->on('civil_states')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('gender_id')->references('id')->on('genders')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('municipality_id')->references('id')->on('municipalities')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}
