<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public $table = 'posts';
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->id();
            $table->string('title', 32);
            $table->string('slug', 64)->unique();
            $table->text('content');
            $table->string('image_path', 128)->nullable()->defaul(null);
            $table->boolean('is_published')->nullable()->defaul(false);
            $table->foreignId('category_id')->contrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table);
    }
};
