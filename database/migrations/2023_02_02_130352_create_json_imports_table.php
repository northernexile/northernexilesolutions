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
        Schema::create('json_imports', function (Blueprint $table) {
            $table->id();
            $table->string('table')->nullable(false);
            $table->dateTime('import_date')->nullable(false);
            $table->integer('records_created')->default(0);
            $table->index(['import_date']);
            $table->index(['table']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('json_imports');
    }
};
