<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // In a new migration file: php artisan make:migration modify_application_columns_to_text
public function up()
{
    Schema::table('application_forms', function (Blueprint $table) {
        // Change these to TEXT or JSON to hold the array data
        $table->text('position_designation')->change();
        $table->text('dates_of_employment')->change();
        $table->text('address_of_company')->change();
        $table->text('status_of_employment')->change();
        $table->text('designation_of_immediate')->change();
        $table->text('reasons_for_moving')->change();
        $table->text('responsibilities_in_position')->change();
        $table->text('case_of_self_employment')->change();
    });

    Schema::table('requirements', function (Blueprint $table) {
        // These now hold JSON lists of filenames, so they need to be bigger
        $table->text('original_school_credentials')->change();
        $table->text('certificate_of_employment')->change();
        $table->text('nbi_barangay_clearance')->change();
        $table->text('recommendation_letter')->change();
        $table->text('proficiency_certificate')->change();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('text', function (Blueprint $table) {
            //
        });
    }
};
