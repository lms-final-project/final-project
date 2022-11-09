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
        if( !Schema::hasTable('instructor_details') ){
            Schema::create('instructor_details', function (Blueprint $table) {
                $table->foreignId('instructor_id')->constrained('users')->onDelete('cascade');
                $table->string('job_title');
                $table->string('description');
                $table->string('image');
                $table->string('phone');
                $table->json('social_links');
                $table->timestamps();
                $table->primary('instructor_id');
            });
        }
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
