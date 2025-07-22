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
        Schema::create('group_users', function (Blueprint $table) {
            $table->id();

            // Relation between user and group
            $table->foreignId('user_id')->constrained('users'); // ID of the user
            $table->foreignId('group_id')->constrained('groups'); // ID of the group where user has joined
            $table->foreignId('created_by')->constrained('users'); // ID of the group creator
            $table->string('role', 25); // Role of the user in the group (Admin or User)
            $table->string('status', 25); // Approved or Pending 
            $table->string('token', 1024)->nullable();  // The token generated to join the group which will be required when auto approval is not available
            $table->timestamp('token_expire_date')->nullable(); // The expire date of the token
            $table->timestamp('token_used')->nullable(); // When the token is used
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_users');
    }
};
