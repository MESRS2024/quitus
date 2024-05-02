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
            $table->text('progres_token')->nullable();
            $table->timestamp('expired_at')->nullable();
            $table->string('progres_id')->nullable();
            $table->string('uuid')->nullable();
            $table->string('idIndividu')->nullable();
            $table->string('etablissement_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('progres_token');
            $table->dropColumn('expired_at');
            $table->dropColumn('progres_id');
            $table->dropColumn('uuid');
            $table->dropColumn('idIndividu');
            $table->dropColumn('etablissement_id');
        });
    }
};
