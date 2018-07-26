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
            $table->string('dpi',13);
            $table->string('nit', 9);
            $table->string('first_name', 45);
            $table->string('second_name', 45)->unsigned();
            $table->string('third_name', 45)->unsigned();
            $table->string('first_surname', 45);
            $table->string('second_surname', 45)->unsigned();
            $table->string('email',60)->unsigned();
            $table->string('phone', 8)->unsigned();
            $table->integer('person_type_id');
            $table->integer('contract_id');
            $table->string('address', 150);
            $table->integer('municipality_id');
            $table->integer('gender_id');
            /**
             * TODO Revisar el campo de scale register, Tamaño, nombre y si hay mas campos en esta tabla.
             */
            $table->string('scale_register',15);
            $table->timestamps();

            /**
             * *Area de las Llaves foraneas
             */
            $table->foreign('person_type_id')->references('id')->on('person_types')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('contract_id')-references('id')->on('contracts')
                ->onDelete('cascade')
                ->onUpdate('casdade');

            $table->foreign('gender_id')->references('id')->on('genders')
                ->onDelete('cascade')
                ->onUpdate('cascade');

                /**
                 * TODO Crear el modelo municipality
                 */
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
