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
        Schema::create('client_invoice_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_invoice_id')->nullable(false);
            $table->unsignedBigInteger('amount_in_pence_ex_vat')->nullable(false);
            $table->date('item_date')->nullable(false);
            $table->string('description');
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
        Schema::dropIfExists('client_invoice_items');
    }
};
