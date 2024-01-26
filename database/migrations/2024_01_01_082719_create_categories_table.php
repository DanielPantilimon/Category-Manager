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
        Schema::create('categories', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->unsignedBigInteger('parent_id')->nullable()->index();
            $table->integer('priority')->index();
            $table->text('name');
            $table->string('slug')->unique()->index();
            $table->text('description');
            $table->timestamps();
            $table->integer('created_by')->index();
            $table->integer('updated_by')->index();
            $table->softDeletes();
            $table->unsignedInteger('owned_by')->index();
            $table->integer('default_template_id')->nullable();
            $table->text('description_html');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
