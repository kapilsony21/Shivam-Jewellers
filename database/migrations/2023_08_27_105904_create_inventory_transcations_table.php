<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('inventory_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->reference('id')->on('products');
            $table->foreignId('customer_id')->reference('id')->on('customers');
            $table->foreignId('customer_invoice_id')->reference('id')->on('customer_invoices');
            $table->foreignId('ledger_id')->reference('id')->on('ledgers');
            $table->integer('quantity');
            $table->integer('type');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('inventory_transcations');
    }
};
