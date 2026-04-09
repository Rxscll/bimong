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
        Schema::table('books', function (Blueprint $table) {
            $table->string('file_pdf')->nullable()->after('tahun_terbit');
            $table->string('cover')->nullable()->after('file_pdf');
            $table->text('deskripsi')->nullable()->after('cover');
            $table->integer('jumlah_dibaca')->default(0)->after('deskripsi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn(['file_pdf', 'cover', 'deskripsi', 'jumlah_dibaca']);
        });
    }
};
