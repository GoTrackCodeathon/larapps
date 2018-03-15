<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnscrIndividualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unscr_individuals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('name_origin')->nullable();
            $table->text('name_alias');
            $table->text('nationality')->nullable();
            $table->text('date_of_birth');
            $table->text('place_of_birth');
            $table->text('comments');
            $table->text('documents');
            $table->string('list_type');
            $table->string('reference_number');
            $table->date('listed_on');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unscr_individuals');
    }
}
