<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('buyer_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('seller_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')->onUpdate('cascade')->onDelete('cascade');
            $table->string('status')->default('pending');
            $table->boolean('isRead')->default(false);
            $table->integer('price');
            $table->integer('quantities');
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
        Schema::dropIfExists('transactions');
    }
}
