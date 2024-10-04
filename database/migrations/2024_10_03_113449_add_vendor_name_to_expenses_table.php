<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVendorNameToExpensesTable extends Migration
{
    public function up()
    {
        Schema::table('expenses', function (Blueprint $table) {
            // Adding vendor_name column as foreign key from vendors table
            $table->unsignedBigInteger('vendor_name')->after('id');  // You can position it where you want
            $table->foreign('vendor_name')->references('id')->on('vendors')->onDelete('cascade');  // Foreign key constraint
        });
    }

    public function down()
    {
        Schema::table('expenses', function (Blueprint $table) {
            // Dropping the foreign key and vendor_name column
            $table->dropForeign(['vendor_name']);
            $table->dropColumn('vendor_name');
        });
    }
}
