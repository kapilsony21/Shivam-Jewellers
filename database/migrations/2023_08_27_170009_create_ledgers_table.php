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
        Schema::create('ledgers', function (Blueprint $table) {
                $table->id();
                $table->foreignId('inventory_transaction_id')->reference('id')->on('inventory_transactions');
                $table->foreignId('product_id')->reference('id')->on('products');
                $table->foreignId('customer_id')->reference('id')->on('customers');
                $table->foreignId('customer_invoice_id')->reference('id')->on('customer_invoices');
                $table->integer('entry_type')->default(0);
                $table->decimal('amount',10,2);
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
        Schema::dropIfExists('ledgers');
    }
};
