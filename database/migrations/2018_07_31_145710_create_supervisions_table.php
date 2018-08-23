<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupervisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supervisions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_type_id')->unsigned();
            $table->integer('person_id')->unsigned();
            $table->integer('school_district_id')->unsigned();
            $table->timestamps();

            $table->foreign('employee_type_id')->references('id')->on('employee_types')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('person_id')->references('id')->on('people')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('school_district_id')->references('id')->on('school_districts')
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
        Schema::dropIfExists('supervisions');
    }
}
