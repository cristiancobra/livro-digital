<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('contact_id')->nullable();
            $table->foreignId('publisher_id')->nullable();
            $table->string('name');
            $table->string('category_id')->nullable();
            $table->integer('year')->nullable();
            $table->string('isbn')->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('trash');
            $table->string('status');
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
        Schema::dropIfExists('books');
    }
};
