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
        Schema::table('laundrys', function (Blueprint $table) {
            $table->unsignedBigInteger('satuans_id')->after('id')->required();
            $table->foreign('satuans_id')->references('id')->on('satuans')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('laundrys', function (Blueprint $table) {
            $table->dropForeign('satuans_id');
            $table->dropColumn('satuans_id');
        });
    }
};
