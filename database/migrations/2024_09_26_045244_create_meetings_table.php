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
    Schema::create('meetings', function (Blueprint $table) {
        $table->id();
        $table->date('date');
        $table->time('time');
        $table->string('duration');
        $table->string('brief_topic');
        $table->string('venue');
        $table->text('notes')->nullable();
        $table->json('agenda')->nullable();
        $table->string('attendees');
        $table->json('alert');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('meetings');
}


   
};
