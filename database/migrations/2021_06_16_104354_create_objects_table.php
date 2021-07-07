<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objects', function (Blueprint $table) {
            $table->id();
            $table->string('object_name')->nullable($value = true);
            $table->string('destination')->nullable($value = true);
            $table->string('contact_info')->nullable($value = true);
            $table->string('type')->nullable($value = true);
            $table->string('other_info')->nullable($value = true);
            $table->string('status')->default('save');
            $table->unsignedBigInteger('category');
            $table->foreign('category')->references('id')->on('categories');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('objects');
    }
}
