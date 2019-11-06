<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->string('title', 50);
            $table->string('name', 50);
            $table->text('description');
            $table->integer('height')->unsigned();
            $table->integer('width')->unsigned();
            $table->integer('length')->unsigned();
            $table->integer('weight')->unsigned();
            $table->string('photo', 255);
            $table->string('email', 255);
            $table->string('phone_number', 20)->nullable();
            $table->string('postcode_a', 7);
            $table->string('postcode_b', 7);
            $table->boolean('avg_confirmed');
            $table->string('show_hash');
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
        Schema::dropIfExists('packages');
    }
}
