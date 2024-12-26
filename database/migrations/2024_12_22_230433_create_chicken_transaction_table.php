<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChickenTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chicken_transaction', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('batch_id'); // Foreign key to batch_chicken table
            $table->unsignedBigInteger('user_id'); // Foreign key to users table
            $table->integer('quantity');
            $table->decimal('price_each', 8, 2); // Price per unit
            $table->decimal('total', 10, 2); // Total price
            $table->timestamps(); // Includes created_at and updated_at

            // Add foreign key constraints
            $table->foreign('batch_id')->references('batch_id')->on('batch_chicken')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chicken_transaction');
    }
}
