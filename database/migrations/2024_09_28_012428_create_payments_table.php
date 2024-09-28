<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('resident_id')->constrained('resident_details')->onDelete('cascade'); // Foreign key for resident details
            $table->unsignedBigInteger('admin_id')->nullable(); // Make admin_id nullable directly without 'change()'
            $table->decimal('amount', 10, 2);
            $table->date('date_of_payment'); // Remove default(now()) to allow date to be set from the form input
            $table->enum('mode_of_payment', ['online', 'offline']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
}


