<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            // $table->increments('id');
            $table->integer('voter_id')->unsigned();
            $table->unique('voter_id');
            $table->integer('design_entry_id')->unsigned();
            $table->index('design_entry_id');
            $table->foreign('voter_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('design_entry_id')->references('id')->on('design_entries')->onDelete('cascade');
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
        Schema::drop('votes');
    }
}
