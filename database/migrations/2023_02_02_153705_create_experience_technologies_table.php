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
        Schema::create('experience_skills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('experience_id')->nullable(false);
            $table->unsignedBigInteger('skill_id')->nullable(false);
            $table->unique(['skill_id','experience_id']);
            $table->foreign('skill_id')->references('id')->on('skills');
            $table->foreign('experience_id')->references('id')->on('experiences');
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
        Schema::dropIfExists('experience_technologies');
    }
};
