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
    Schema::table('visitors', function (Blueprint $table) {
        $table->string('status')->default('pending'); // You can also set default as 'approved' or 'rejected'
    });
}

public function down()
{
    Schema::table('visitors', function (Blueprint $table) {
        $table->dropColumn('status');
    });
}

};
