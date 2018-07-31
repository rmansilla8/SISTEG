<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_titles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('title_id');
            $table->integer('employee_id');
            $table->timestamps();

            $table->foreign('title_id')->references('id')->on('titles')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            
            $table->foreign('employee_id')->references('id')->on('employees')
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
        Schema::dropIfExists('employee_titles');
    }
}
