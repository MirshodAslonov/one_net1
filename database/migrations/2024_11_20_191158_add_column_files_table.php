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
        Schema::table('files', function (Blueprint $table) {
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')
                ->references('id')
                ->on('clients');
            $table->string('path');
            $table->string('url');
            $table->string('image_type');
            $table->string('mime_type');
            $table->integer('size');
            $table->enum('is_active',[0,1])->default(1);  // Assuming active is true by default
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('files', function (Blueprint $table) {
            $table->dropColumn('is_active');
            $table->dropColumn('size');
            $table->dropColumn('mime_type');
            $table->dropColumn('image_type');
            $table->dropColumn('url');
            $table->dropColumn('path');
            $table->dropColumn('client_id');
        });
    }
};
