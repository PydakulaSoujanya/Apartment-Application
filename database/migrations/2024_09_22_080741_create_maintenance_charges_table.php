<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintenanceChargesTable extends Migration
{
    public function up()
    {
        Schema::create('maintenance_charges', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount_per_sqt', 8, 2);
            $table->unsignedBigInteger('admin_id'); // Replace resident_detail_id with admin_id
            $table->timestamps();
    
            // Set up foreign key constraint to the users table (assuming it's the admins table)
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
    

    public function down()
    {
        Schema::dropIfExists('maintenance_charges');
    }
}
