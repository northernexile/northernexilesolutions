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
        Schema::create('json_exports', function (Blueprint $table) {
            $table->id();
            $table->string('table')->nullable(false);
            $table->dateTime('exported_at')->nullable(false);
            $table->integer('records_exported')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('json_exports');
    }
};
