<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_languages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('language_id');
            $table->integer('language_domain_id');
            $table->integer('employee_id');
            $table->timestamps();

            $table->foreign('language_id')->references('id')->on('languages')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('language_domain_id')->references('id')->on('language_domains')
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
        Schema::dropIfExists('employee_languages');
    }
}
