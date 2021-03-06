<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('affiliate_id')->unsigned();
            $table->integer('fee_type_id')->unsigned();
            $table->decimal('amount');
            $table->date('date');
            //$table->year('year');
            $table->text('detail');
            $table->timestamps();

            $table->foreign('affiliate_id')->references('id')->on('affiliates')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('fee_type_id')->references('id')->on('fee_types')
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
        Schema::dropIfExists('fees');
    }
}
