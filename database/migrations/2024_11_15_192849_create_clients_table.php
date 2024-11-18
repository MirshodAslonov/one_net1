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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name_organ');
            $table->string('mgmt_ip')
                ->unique()
                ->nullable();
            $table->string('vlan')->nullable();
            $table->string('ip')->nullable();
            $table->string('port')->nullable();
            $table->string('zayafka');
            $table->string('client_number')->nullable();
            $table->string('client_name')->nullable();
            $table->string('speed')->nullable();
            $table->date('date_connect')->nullable();
            $table->string('stp_zayafka')->nullable();
            $table->string('vlan_ip')->nullable();
            $table->string('atc')->nullable();
            $table->string('location')->nullable();
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->foreign('branch_id')
                ->references('id')
                ->on('branches');
            $table->unsignedBigInteger('organ_id')->nullable();
            $table->foreign('organ_id')
                ->references('id')
                ->on('organs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
