<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolWorkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_workers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_id');
            $table->integer('employee_id');
            $table->integer('contract_id');
            $table->integer('worker_type_id');
            $table->timestamps();

            $table->foreign('school_id')->references('id')->on('schools')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('employee_id')->references('id')->on('employees')
                -onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('contract_id')->references('id')->on('contracts')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('worker_type_id')->references('id')->on('worker_types')
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
        Schema::dropIfExists('school_workers');
    }
}
