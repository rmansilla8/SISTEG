<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommitteesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('committees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('affiliate_id')->unsigned();
            $table->integer('position_id')->unsigned();
            $table->integer('committee_level_id')->unsigned();
            $table->integer('user_id')->unsigned();
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
        Schema::dropIfExists('committees');
    }
}
