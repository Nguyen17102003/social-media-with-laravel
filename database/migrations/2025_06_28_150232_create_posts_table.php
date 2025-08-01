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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->longtext('body')->nullable(); // Body of the post
            $table->foreignId('user_id')->constrained('users'); // The ID of the user
            $table->foreignId('group_id')->nullable()->constrained('groups'); // The ID of the group where user has joined
            $table->foreignId('deleted_by')->nullable()->constrained('users'); 
            $table->timestamp('deleted_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
