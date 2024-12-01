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
        Schema::create('client_problems', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')
                ->references('id')
                ->on('clients');
            $table->string('status');
//            $table->text('problem');
            $table->text('answer')->nullable();
            $table->unsignedBigInteger('problem_user_id');
            $table->foreign('problem_user_id')
                ->references('id')
                ->on('users');
            $table->unsignedBigInteger('answer_user_id')->nullable();
            $table->foreign('answer_user_id')
                ->references('id')
                ->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_problems');
    }
};
