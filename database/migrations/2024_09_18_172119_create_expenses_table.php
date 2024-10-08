<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vendor_name')->constrained('vendors');  // Foreign key to vendors table
            $table->string('category');
            $table->text('description')->nullable();
            $table->decimal('amount', 10, 2);
            $table->date('paid_date');
            $table->string('month');
            $table->string('file_path')->nullable();
            $table->unsignedBigInteger('vendor_name')->after('id');  // You can position it where you want
            $table->foreign('vendor_name')->references('id')->on('vendors')->onDelete('cascade');  // Foreign key constraint
            $table->timestamps();
        });
    }
    

    public function down()
    {
        Schema::dropIfExists('expenses');
    }
}
