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
        Schema::create('post_attachments', function (Blueprint $table) {
            $table->id();

            // Infomation of the attachment in the post
            $table->foreignId('post_id')->constrained('posts'); // ID of the post
            $table->foreignId('created_by')->constrained('users'); // ID of the attachment creator
            $table->string('name', 255); // Name of attachment
            $table->string('path', 255); // Path of attachment
            $table->string('mime', 25); // Multipurpose Internet Mail Extensions
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_attachments');
    }
};
