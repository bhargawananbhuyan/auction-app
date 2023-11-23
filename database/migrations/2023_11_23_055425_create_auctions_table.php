<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('auctions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('added_by')->references('id')->on('users')->cascadeOnDelete();
            $table->string('product_name');
            $table->text('product_details');
            $table->float('base_amount');
            $table->float('sold_for')->nullable();
            $table->enum('status', ['not_sold', 'sold'])->default('not_sold');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auctions');
    }
};
