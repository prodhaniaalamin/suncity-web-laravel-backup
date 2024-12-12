<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealtimeNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realtime_notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('created_by');
            $table->foreignId('send_type');
            $table->string('type', 50)->default('Notification');
            $table->string('title', 250);
            $table->longText('content');
            $table->json('attached')->nullable();
            $table->json('attached_files')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('realtime_notifications');
    }
}
