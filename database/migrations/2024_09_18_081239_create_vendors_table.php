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
    Schema::create('vendors', function (Blueprint $table) {
        $table->id();
        $table->string('vendor_id')->unique();
        $table->string('vendor_name');
        $table->string('vendor_contact_name')->nullable();
        $table->string('vendor_phone')->nullable();
        $table->string('vendor_email')->nullable();
        $table->string('account_head')->nullable();
        $table->text('notes')->nullable();
        $table->boolean('is_active')->default(1);
        $table->decimal('tds_rate', 5, 2)->nullable();
        $table->string('gstin')->nullable();
        $table->decimal('igst', 5, 2)->nullable();
        $table->decimal('cgst', 5, 2)->nullable();
        $table->decimal('sgst', 5, 2)->nullable();
        $table->string('pan_no')->nullable();
        $table->string('tds_section_code')->nullable();
        $table->string('vendor_legal_type')->nullable();
        $table->string('payee_name')->nullable();
        $table->text('billing_address')->nullable();
        $table->string('bank_account_no')->nullable();
        $table->string('bank_name_branch')->nullable();
        $table->string('bank_ifsc_code')->nullable();
        $table->timestamps();
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
