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
        Schema::create('customer_invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->reference('id')->on('customers');
            $table->foreignId('inventory_transaction_id')->reference('id')->on('inventory_transactions');
            $table->foreignId('product_id')->reference('id')->on('products');
            $table->foreignId('ledger_id')->reference('id')->on('ledgers');
            $table->decimal('rate',10,2)->default(0);
            $table->decimal('tax_amount',10,2)->default(0);
            $table->decimal('total_amount',10,2);
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
        Schema::dropIfExists('customer_invoices');
    }
};
