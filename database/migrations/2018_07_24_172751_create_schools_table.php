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
            $table->integer('nivel_id');
            $table->integer('school_district_id');
            $table->integer('area_id');
            $table->integer('clasification_id');
            $table->integer('modality_id');
            $table->integer('turn_id');
            $table->string('address', 200);
            $table->timestamps();

            /**
             * *Area de las llaves foraneas
             */

            $table->foreign('nivel_id')->references('id')->on('nivels')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            
            $table->foreign('school_district_id')->references('id')->on('school_districts')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('area_id')->references('id')->on('areas')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('clasification_id')->references('id')->on('clasifications')
                ->onDelete('cascade')
                ->onUPdate('cascade');
            
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
