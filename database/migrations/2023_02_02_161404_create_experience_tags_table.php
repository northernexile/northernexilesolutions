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
        Schema::create('experience_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('experience_id')->nullable(false);
            $table->unsignedBigInteger('tag_id')->nullable(false);
            $table->unique(['experience_id','tag_id']);
            $table->foreign('experience_id')->references('id')->on('experiences');
            $table->foreign('tag_id')->references('id')->on('tags');
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
        Schema::dropIfExists('experience_tags');
    }
};
