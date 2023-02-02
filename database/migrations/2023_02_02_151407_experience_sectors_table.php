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
        Schema::create('experience_sectors',function (Blueprint $table){
           $table->id();
           $table->unsignedBigInteger('sector_id')->nullable(false);
           $table->unsignedBigInteger('experience_id')->nullable(false);
           $table->index(['sector_id','experience_id']);
           $table->foreign('sector_id')->on('sectors')->references('id');
           $table->foreign('experience_id')->on('experiences')->references('id');
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
        //
    }
};
