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
           $table->dropColumn('email');
           $table->dropColumn('email_verified_at');
           $table->dropColumn('remember_token');
           $table->string('phone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
