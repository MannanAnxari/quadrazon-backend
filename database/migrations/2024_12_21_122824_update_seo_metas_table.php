<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSeoMetasTable extends Migration
{
    public function up(): void
    {
        Schema::table('seo_metas', function (Blueprint $table) {
            // Adding new columns
            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('seo_metas', function (Blueprint $table) {
            // Dropping the added columns in case of rollback
            $table->dropColumn(['meta_title', 'meta_description', 'meta_keywords']);
        });
    }
}
