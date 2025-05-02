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
        Schema::create('carrier_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('carrier_id');
            $table->string('document_type')->nullable();
            $table->string('file_path')->nullable();
            $table->date('expires_at')->nullable();
            $table->string('status')->nullable();
            $table->text('notes')->nullable();
            $table->foreign('carrier_id')->references('id')->on('carriers')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carrier_documents');
    }
};
