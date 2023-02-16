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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('thoroughfare')->nullable(true);
            $table->string('address_line_1')->nullable(true);
            $table->string('address_line_2')->nullable(true);
            $table->string('address_line_3')->nullable(true);
            $table->string('town')->nullable(true);
            $table->string('county')->nullable(true);
            $table->string('postcode')->nullable(true);
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
        Schema::dropIfExists('addresses_');
    }
};
