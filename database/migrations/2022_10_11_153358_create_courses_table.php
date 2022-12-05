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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('file')->nullable();
            $table->string('title');
            $table->string('description');
            $table->boolean('is_free')->default(false);
            $table->double('price')->nullable();
            $table->double('price_after_discount')->nullable();
            $table->boolean('has_certificate')->default(false);
            $table->string('certification')->nullable();
            $table->foreignId('course_type_id')->constrained('course_types');
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('instructor_id')->constrained('users');
            $table->foreignId('days_id')->constrained('course_days');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('start_time');
            $table->string('end_time');
            $table->enum('status',  ['accepted' , 'pinned' , 'rejected'])->default('pinned');
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
        Schema::dropIfExists('courses');
    }
};
