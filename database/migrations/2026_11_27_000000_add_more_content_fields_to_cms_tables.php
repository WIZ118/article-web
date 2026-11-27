<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('cms_home', function (Blueprint $table) {
            $table->string('badge_text')->nullable();
            $table->string('primary_button_label')->nullable();
            $table->string('secondary_button_label')->nullable();
            $table->string('featured_label')->nullable();
            $table->string('featured_title')->nullable();
            $table->string('featured_link_label')->nullable();
        });

        Schema::table('cms_about', function (Blueprint $table) {
            $table->string('section_label')->nullable();
            $table->string('mission_title')->nullable();
            $table->text('mission_content')->nullable();
            $table->string('vision_title')->nullable();
            $table->text('vision_content')->nullable();
            $table->string('contact_button_label')->nullable();
        });

        Schema::table('cms_contact', function (Blueprint $table) {
            $table->string('section_label')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('office')->nullable();
            $table->string('support_badge')->nullable();
            $table->string('support_title')->nullable();
            $table->text('support_content')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('cms_home', function (Blueprint $table) {
            $table->dropColumn([
                'badge_text',
                'primary_button_label',
                'secondary_button_label',
                'featured_label',
                'featured_title',
                'featured_link_label',
            ]);
        });

        Schema::table('cms_about', function (Blueprint $table) {
            $table->dropColumn([
                'section_label',
                'mission_title',
                'mission_content',
                'vision_title',
                'vision_content',
                'contact_button_label',
            ]);
        });

        Schema::table('cms_contact', function (Blueprint $table) {
            $table->dropColumn([
                'section_label',
                'email',
                'phone',
                'office',
                'support_badge',
                'support_title',
                'support_content',
            ]);
        });
    }
};
