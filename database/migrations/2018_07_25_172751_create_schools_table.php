<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('code');
            $table->string('name', 150);
            $table->integer('level_id')->unsigned();
            $table->integer('school_district_id')->unsigned();
            $table->integer('area_id')->unsigned();
            $table->integer('classification_id')->unsigned();
            $table->integer('modality_id')->unsigned();
            $table->integer('turn_id')->unsigned();
            $table->string('address', 200);
            $table->timestamps();

            /**
             * *Area de las llaves foraneas
             */

            $table->foreign('level_id')->references('id')->on('levels')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            
            $table->foreign('school_district_id')->references('id')->on('school_districts')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('area_id')->references('id')->on('areas')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('classification_id')->references('id')->on('classifications')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            
            $table->foreign('modality_id')->references('id')->on('modalities')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            
            $table->foreign('turn_id')->references('id')->on('turns')
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
        Schema::dropIfExists('schools');
    }
}
