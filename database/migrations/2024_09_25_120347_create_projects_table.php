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
    Schema::create('projects', function (Blueprint $table) {
        $table->id();
        $table->string('category');
        $table->string('topic');
        $table->enum('status', ['Open', 'Closed', 'In Progress'])->default('Open');
        $table->enum('priority', ['low', 'medium', 'high'])->default('low');
        $table->string('driven_by')->nullable();
        $table->date('target_date')->nullable();
        $table->string('file_path')->nullable();  // For file uploads
        $table->text('note')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
