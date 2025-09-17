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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('content_type')->default('POST');
            $table->integer('content_id');
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->longText('content');
            $table->boolean('is_published')->default(false);
            $table->integer('like_count')->default(0);
            $table->integer('dislike_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
