<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('aset_tanah', function (Blueprint $table) {

            $table->string('sumber_perolehan')
                ->nullable()
                ->after('deskripsi');

            $table->decimal('nilai_perkiraan', 20, 2)
                ->nullable()
                ->after('sumber_perolehan');

            $table->unsignedSmallInteger('tahun_perolehan')
                ->nullable()
                ->after('nilai_perkiraan');

            $table->json('dokumen')
                ->nullable()
                ->after('tahun_perolehan');

        });
    }

    public function down(): void
    {
        Schema::table('aset_tanah', function (Blueprint $table) {

            $table->dropColumn([
                'sumber_perolehan',
                'nilai_perkiraan',
                'tahun_perolehan',
                'dokumen',
            ]);

        });
    }
};