<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nit')->unique();
            $table->string('scale_register')->unique();
            $table->integer('person_id')->unsigned()->unique();
            $table->integer('ethnic_community_id')->unsigned();
            $table->integer('employee_type_id')->unsigned();
            $table->timestamps();

            $table->foreign('person_id')->references('id')->on('people')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('ethnic_community_id')->references('id')->on('ethnic_communities')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('employee_type_id')->references('id')->on('employee_types')
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
        Schema::dropIfExists('employees');
    }
}
