<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidentAccountsTable extends Migration
{
    public function up()
    {
        // Check if the 'resident_accounts' table exists
        if (!Schema::hasTable('resident_accounts')) {
            Schema::create('resident_accounts', function (Blueprint $table) {
                $table->id();
                
                // Add foreign key 'resident_id' referencing 'resident_details' table
                $table->foreignId('resident_id')
                      ->constrained('resident_details')
                      ->onDelete('cascade'); // Ensure foreign key constraint and cascading delete
                
                $table->string('block_name');
                $table->integer('floor');
                $table->string('flat_number');
                $table->string('flat_type');
                $table->decimal('amount_per_sft', 8, 2);
                $table->integer('square_feet');
                $table->decimal('maintenance_fee', 8, 2);
                $table->string('amount_type');
                $table->date('date');
                $table->string('status');
                $table->timestamps();
            });
        } else {
            // Check if 'resident_id' column doesn't already exist before adding it
            if (!Schema::hasColumn('resident_accounts', 'resident_id')) {
                Schema::table('resident_accounts', function (Blueprint $table) {
                    $table->foreignId('resident_id')
                          ->constrained('resident_details')
                          ->onDelete('cascade'); // Ensure foreign key constraint and cascading delete
                });
            }
        }
    }

    public function down()
    {
        // Optional: Drop 'resident_id' column instead of the whole table (if needed)
        Schema::table('resident_accounts', function (Blueprint $table) {
            $table->dropForeign(['resident_id']);
            $table->dropColumn('resident_id');
        });

        Schema::dropIfExists('resident_accounts');
    }
}
