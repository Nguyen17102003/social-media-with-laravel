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
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            // Group Infomation
            $table->foreignId('created_by')->constrained('users');  // ID of the creator
            $table->string('name', 255); // Name of the group
            $table->string('slug', 255); // The "slug" of the group (etc. my-group)
            $table->string('cover_path', 1024)->nullable(); // The path of cover image
            $table->string('thumbnail_path', 255)->nullable(); // The path of thumbnail image
            $table->boolean('auto_approval')->default(true); // Is the group turns on auto approval
            $table->text('about')->nullable(); // Description of the group
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
        Schema::dropIfExists('groups');
    }
};
