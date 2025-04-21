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
        Schema::create('trucks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('carrier_id');
            $table->string('plate_number');
            $table->string('trucker_number')->nullable();
            $table->string('service_category');
            $table->boolean('in_service');
            $table->string('location');
            $table->foreignId('truck_id')->nullable()->constrained('trucks')->onDelete('set null');
            $table->foreign('carrier_id')->references('id')->on('carriers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trucks');
    }
};
