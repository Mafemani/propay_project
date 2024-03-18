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
        Schema::table('people', function (Blueprint $table) {
            $table->string('name');
            $table->string('surname');
            $table->string('sa_id_number');
            $table->string('mobile_number');
            $table->string('email_address');
            $table->string('birth_date');
            $table->string('language'); // Single Selection
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('people', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('surname');
            $table->dropColumn('sa_id_number');
            $table->dropColumn('mobile_number');
            $table->dropColumn('email_address');
            $table->dropColumn('birth_date');
            $table->dropColumn('language');
        });
    }
};
