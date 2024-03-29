<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->index();
            $table->string('name');
            $table->string('slug')->unique()->index();
            $table->longText('html');
            $table->longText('text');
            $table->integer('priority')->index();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable()->index();
            $table->integer('created_by')->index();
            $table->integer('updated_by')->index();
            $table->boolean('draft')->default(false)->index();
            $table->longText('markdown');
            $table->integer('revision_count');
            $table->boolean('template')->default(false)->index();
            $table->softDeletes();
            $table->unsignedInteger('owned_by')->index();
            $table->string('editor', 50)->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
