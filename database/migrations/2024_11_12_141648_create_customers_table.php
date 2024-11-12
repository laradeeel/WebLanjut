<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // Add other customer fields as needed (e.g., email, address, etc.)
            $table->unsignedBigInteger('region_id'); // Foreign key to regions table
            $table->timestamps();

            $table->foreign('region_id')->references('id')->on('regions');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
