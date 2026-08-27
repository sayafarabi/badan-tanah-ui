<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pengaturan_websites', function (Blueprint $table) {
            $table->text('footer_deskripsi')->nullable();
            $table->text('footer_alamat')->nullable();
            $table->string('footer_email')->nullable();
            $table->string('footer_telepon')->nullable();

            $table->string('footer_facebook')->nullable();
            $table->string('footer_twitter')->nullable();
            $table->string('footer_instagram')->nullable();
            $table->string('footer_linkedin')->nullable();

            $table->string('footer_copyright')->nullable();
            $table->string('footer_privacy')->nullable();
            $table->string('footer_terms')->nullable();
            $table->string('footer_accessibility')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('pengaturan_websites', function (Blueprint $table) {
            $table->dropColumn([
                'footer_deskripsi',
                'footer_alamat',
                'footer_email',
                'footer_telepon',
                'footer_facebook',
                'footer_twitter',
                'footer_instagram',
                'footer_linkedin',
                'footer_copyright',
                'footer_privacy',
                'footer_terms',
                'footer_accessibility',
            ]);
        });
    }
};