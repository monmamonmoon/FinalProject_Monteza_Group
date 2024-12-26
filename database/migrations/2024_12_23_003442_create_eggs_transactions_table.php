<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEggsTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eggs_transactions', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('batch_id')
                ->constrained('batch_eggs', 'batch_id')
                ->onDelete('cascade'); // Foreign key to batch_eggs table
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade'); // Foreign key to users table
            $table->integer('quantity'); // Quantity of eggs
            $table->decimal('price_each', 10, 2); // Price per egg
            $table->decimal('total', 10, 2); // Total price
            $table->timestamps(); // Created at and updated at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eggs_transactions');
    }
}
