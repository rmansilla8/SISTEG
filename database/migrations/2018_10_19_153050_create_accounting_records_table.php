<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountingRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounting_records', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description');
            $table->decimal('amount');
            $table->date('date');
            $table->integer('record_type_id')->unsigned();
            $table->timestamps();

            $table->foreign('record_type_id')->references('id')->on('record_types')
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
        Schema::dropIfExists('accounting_records');
    }
}
