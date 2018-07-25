<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommiteesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commitees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('affiliate_id');
            $table->integer('position_id');
            $table->integer('committee_level_id');
            $table->integer('user_id');
            $table->timestamps();

            $table->foreign('affiliate_id')->references('id')->on('affiliates')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('position_id')->references('id')->on('positions')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('committee_level_id')->references('id')->on('committee_levels')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            
            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::dropIfExists('commitees');
    }
}
