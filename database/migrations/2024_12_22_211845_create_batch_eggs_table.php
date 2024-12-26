<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('batch_eggs', function (Blueprint $table) {
            $table->id('batch_id');
            $table->string('batch_name');
            $table->integer('quantity')->default(0);
            $table->enum('quality',['small','medium','large']);
            $table->decimal('price')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batch_eggs');
    }
};
