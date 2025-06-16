<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Tambahkan NIM setelah kolom name
            if (!Schema::hasColumn('users', 'nim')) {
                $table->string('nim')->unique()->after('name');
            }

            // Tambahkan role setelah kolom nim
            if (!Schema::hasColumn('users', 'role')) {
                $table->string('role')->default('user')->after('nim');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'nim')) {
                $table->dropColumn('nim');
            }
            if (Schema::hasColumn('users', 'role')) {
                $table->dropColumn('role');
            }
        });
    }
};
