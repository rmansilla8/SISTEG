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
            $table->string('names', 80);
            $table->string('surnames', 80);
            $table->string('email', 60)->unique()->nullable();
            $table->string('phone', 8)->nullable();
            $table->string('address', 150);
            $table->integer('municipality_id')->unsigned();
            $table->integer('gender_id')->unsigned();
            $table->date('birthdate');
            $table->integer('civil_status_id')->unsigned();
            $table->timestamps();

            /**
             * *Area de las Llaves foraneas
             */
            $table->foreign('civil_status_id')->references('id')->on('civil_status')
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
