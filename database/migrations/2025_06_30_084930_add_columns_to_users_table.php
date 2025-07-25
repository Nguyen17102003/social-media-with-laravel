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
        Schema::table('users', function (Blueprint $table) {
            $table->string('username'); // Username
            $table->string('cover_path', 1024)->nullable(); // Path of cover image
            $table->string('avatar_path', 1024)->nullable(); // Path of avatar image
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('username'); 
            $table->dropColumn('cover_path'); 
            $table->dropColumn('avatar_path'); 
        });
    }
};
