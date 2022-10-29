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
        Schema::create('instructor__details', function (Blueprint $table) {
            $table->id()->primary()->foreignId('id')->constrained('users');
            $table->string('job_title');
            $table->string('image');
            $table->string('phone');
            $table->json('social_links');
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
        Schema::dropIfExists('instructor__details');
    }
};
