<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHelpDeskRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('help_desk_requests', function (Blueprint $table) {
            $table->id();
            $table->string('request_title');
            $table->text('description');
            $table->string('office')->nullable();
            $table->string('category');
            $table->date('preferred_date')->nullable();
            $table->boolean('urgent')->default(false);
            $table->text('attachments')->nullable(); // To store multiple file paths as JSON
            $table->string('status')->default('OPEN');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('help_desk_requests');
    }
}

