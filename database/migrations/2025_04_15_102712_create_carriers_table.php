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
        Schema::create('carriers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('company_address', 255)->nullable();
            $table->string('phone')->nullable();
            $table->string('authority')->nullable();
            $table->string('dot')->nullable();
            $table->string('mc')->nullable();
            $table->string('scac_code')->nullable();
            $table->string('country')->nullable();
            $table->string('caat_code')->nullable();
            $table->string('service_category')->nullable();
            $table->string('transfer_approval_documents')->nullable();
            $table->string('insurance_certificate')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carriers');
    }
};
