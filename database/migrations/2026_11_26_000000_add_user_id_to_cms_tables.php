<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        foreach (['cms_home', 'cms_about', 'cms_contact'] as $tableName) {
            Schema::table($tableName, function (Blueprint $table) {
                $table->unsignedBigInteger('user_id')->nullable();
                $table->unique('user_id');
                $table->foreign('user_id')->references('id')->on('user')->cascadeOnDelete();
            });
        }
    }

    public function down(): void
    {
        foreach (['cms_home', 'cms_about', 'cms_contact'] as $tableName) {
            Schema::table($tableName, function (Blueprint $table) {
                $table->dropForeign(['user_id']);
                $table->dropUnique(['user_id']);
                $table->dropColumn('user_id');
            });
        }
    }
};
