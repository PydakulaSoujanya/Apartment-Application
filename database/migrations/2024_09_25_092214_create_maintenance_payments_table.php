<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintenancePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('maintenance_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->decimal('amount', 10, 2);
            $table->timestamp('payment_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('maintenance_payments');
    }
}
