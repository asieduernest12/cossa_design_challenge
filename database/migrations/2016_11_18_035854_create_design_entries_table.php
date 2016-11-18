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
            $table->string('filename-front');
            $table->string('address-front');
            $table->string('src_side');
            $table->string('filename-side');
            $table->string('address-side');
            $table->string('src_back');
            $table->string('filename-back');
            $table->string('address-back');
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
