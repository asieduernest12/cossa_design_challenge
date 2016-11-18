<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesignEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('design_entries', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('designer');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->longText('description')->nullable();
            $table->string('src_front');
            $table->string('filename_front');
            $table->string('address_front');
            $table->string('src_side');
            $table->string('filename_side');
            $table->string('address_side');
            $table->string('src_back');
            $table->string('filename_back');
            $table->string('address_back');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('design_entries');
    }
}
