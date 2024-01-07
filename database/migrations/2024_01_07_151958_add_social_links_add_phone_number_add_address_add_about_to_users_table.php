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
            $table->string('website_link', 255)->nullable()->after('background_image_path');
            $table->string('github_link', 255)->nullable()->after('website_link');
            $table->string('youtube_link', 255)->nullable()->after('github_link');
            $table->string('instagram_link', 255)->nullable()->after('youtube_link');
            $table->string('facebook_link', 255)->nullable()->after('instagram_link');
            $table->string('phone_number', 15)->nullable()->after('facebook_link');
            $table->string('address', 255)->nullable()->after('phone_number');
            $table->string('about', 1000)->nullable()->after('address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'website_link',
                'github_link',
                'youtube_link',
                'instagram_link',
                'facebook_link',
                'phone_number',
                'address',
                'about'
            ]);
        });
    }
};
