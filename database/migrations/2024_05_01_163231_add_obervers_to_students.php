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
        Schema::table('students', function (Blueprint $table) {
            $table->unsignedBigInteger('sit_bc_updatedBy')->after('sit_bc')->nullable();
            $table->timestamp('sit_bc_updated_at')->after('sit_bc')->nullable();

            $table->unsignedBigInteger('sit_bf_updatedBy')->after('sit_bf')->nullable();
            $table->timestamp('sit_bf_updated_at')->after('sit_bf')->nullable();

            $table->unsignedBigInteger('sit_ru_updatedBy')->after('sit_ru')->nullable();
            $table->timestamp('sit_ru_updated_at')->after('sit_ru')->nullable();

            $table->unsignedBigInteger('sit_brs_updatedBy')->after('sit_brs')->nullable();
            $table->timestamp('sit_brs_updated_at')->after('sit_brs')->nullable();

            $table->unsignedBigInteger('sit_dep_updatedBy')->after('sit_dep')->nullable();
            $table->timestamp('sit_dep_updated_at')->after('sit_dep')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn(['sit_bc_updatedBy']);
            $table->dropColumn('sit_bc_updated_at');

            $table->dropColumn(['sit_bf_updatedBy']);
            $table->dropColumn('sit_bf_updated_at');

            $table->dropColumn(['sit_ru_updatedBy']);
            $table->dropColumn('sit_ru_updated_at');

            $table->dropColumn(['sit_brs_updatedBy']);
            $table->dropColumn('sit_brs_updated_at');

            $table->dropColumn(['sit_dep_updatedBy']);
            $table->dropColumn('sit_dep_updated_at');

        });
    }
};
