<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('halaman', function (Blueprint $table) {

            // =========================
            // TENTANG
            // =========================

            $table->longText('profil_lembaga')
                ->nullable()
                ->after('isi');

            $table->longText('visi')
                ->nullable()
                ->after('profil_lembaga');

            $table->longText('misi')
                ->nullable()
                ->after('visi');

            $table->longText('struktur_organisasi')
                ->nullable()
                ->after('misi');

            $table->longText('landasan_hukum')
                ->nullable()
                ->after('struktur_organisasi');


            // =========================
            // PEMANFAATAN
            // =========================

            $table->longText('tentang_pemanfaatan')
                ->nullable()
                ->after('landasan_hukum');

            $table->longText('skema_pemanfaatan')
                ->nullable()
                ->after('tentang_pemanfaatan');

            $table->longText('bentuk_kerjasama')
                ->nullable()
                ->after('skema_pemanfaatan');

            $table->longText('prosedur_tahapan')
                ->nullable()
                ->after('bentuk_kerjasama');

            $table->longText('persyaratan')
                ->nullable()
                ->after('prosedur_tahapan');

        });
    }

    public function down(): void
    {
        Schema::table('halaman', function (Blueprint $table) {

            $table->dropColumn([
                'profil_lembaga',
                'visi',
                'misi',
                'struktur_organisasi',
                'landasan_hukum',
                'tentang_pemanfaatan',
                'skema_pemanfaatan',
                'bentuk_kerjasama',
                'prosedur_tahapan',
                'persyaratan',
            ]);

        });
    }
};