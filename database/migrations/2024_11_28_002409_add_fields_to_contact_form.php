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
        Schema::table('contact_forms', function (Blueprint $table) {
            $table->string('phone')->after('email');
            $table->enum('source', ['contact', 'consultation'])->after('message');
            $table->string('website')->nullable()->after('source');
            $table->text('goals')->nullable()->after('website');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contact_forms', function (Blueprint $table) {
            $table->dropColumn(['phone', 'source', 'website', 'goals']);
        });
    }
};
