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
        Schema::table('categories', function(Blueprint $table) {
            $table->foreign('parent_id')->references('id')->on('categories')->onUpdate('CASCADE')->onDelete('SET NULL');
          });

        Schema::table('pages', function(Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('CASCADE')->onDelete('CASCADE');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropForeign('categories_parent_id_foreign');

        });

        Schema::table('pages', function (Blueprint $table) {
            $table->dropForeign('pages_category_id_foreign');

        });
    }
};
