<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     * This migration adds 'Ready for Interview' status and updates 
     * 'Accepted by Assessor' to 'Ready for Interview' for existing records.
     */
    public function up(): void
    {
        // First, modify the enum to include 'Ready for Interview'
        DB::statement("ALTER TABLE application_forms MODIFY COLUMN status ENUM(
            'Pending',
            'Accepted by Admin',
            'Rejected by Admin',
            'Accepted by Assessor',
            'Ready for Interview',
            'Rejected by Assessor',
            'Final Admission List'
        ) NOT NULL DEFAULT 'Pending'");

        // Then update existing 'Accepted by Assessor' records to 'Ready for Interview'
        DB::table('application_forms')
            ->where('status', 'Accepted by Assessor')
            ->update(['status' => 'Ready for Interview']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert 'Ready for Interview' back to 'Accepted by Assessor'
        DB::table('application_forms')
            ->where('status', 'Ready for Interview')
            ->update(['status' => 'Accepted by Assessor']);

        // Restore the original enum without 'Ready for Interview'
        DB::statement("ALTER TABLE application_forms MODIFY COLUMN status ENUM(
            'Pending',
            'Accepted by Admin',
            'Rejected by Admin',
            'Accepted by Assessor',
            'Rejected by Assessor',
            'Final Admission List'
        ) NOT NULL DEFAULT 'Pending'");
    }
};
