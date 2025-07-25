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
        Schema::create('post_reactions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('post_id')->constrained('posts'); // ID of the post
            $table->foreignId('user_id')->constrained('users'); // ID of who reacts
            $table->string('type'); // Type of reaction (etc. like, dislike)
            $table->timestamp('created_at')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_reactions');
    }
};
