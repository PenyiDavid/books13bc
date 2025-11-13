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
        Schema::create('book_borrowing', function (Blueprint $table) {
            $table->id();
            $table->foreignId("book_id")->references("id")->on("books")->onDelete('cascade');
            $table->foreignId("borrowing_id")->constrained();
            $table->date("back_date")->default(null);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_borrowing');
    }
};
