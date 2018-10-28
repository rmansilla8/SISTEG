<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_schools', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_id')->unsigned();
            $table->integer('employee_id')->unsigned();
            $table->integer('contract_id')->unsigned();
            $table->integer('work_state_id')->unsigned();
            $table->integer('employee_type_id')->unsigned();
            $table->string('year_start', 4);
            $table->timestamps();

            $table->foreign('school_id')->references('id')->on('schools')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('employee_id')->references('id')->on('employees')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('contract_id')->references('id')->on('contracts')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('work_state_id')->references('id')->on('work_states')
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
        Schema::dropIfExists('employee_schools');
    }
}
