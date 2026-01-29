<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     * This migration removes Department Coordinator and College Coordinator statuses
     * and updates existing data to use 'Accepted by Assessor' instead.
     */
    public function up(): void
    {
        // First, update any existing records that have coordinator statuses
        DB::table('application_forms')
            ->where('status', 'Accepted by Department Coordinator')
            ->update(['status' => 'Accepted by Assessor']);
        
        DB::table('application_forms')
            ->where('status', 'Rejected by Department Coordinator')
            ->update(['status' => 'Rejected by Assessor']);
        
        DB::table('application_forms')
            ->where('status', 'Accepted by College Coordinator')
            ->update(['status' => 'Accepted by Assessor']);
        
        DB::table('application_forms')
            ->where('status', 'Rejected by College Coordinator')
            ->update(['status' => 'Rejected by Assessor']);

        // Now modify the enum to remove the coordinator statuses
        DB::statement("ALTER TABLE application_forms MODIFY COLUMN status ENUM(
            'Pending',
            'Accepted by Admin',
            'Rejected by Admin',
            'Accepted by Assessor',
            'Rejected by Assessor',
            'Final Admission List'
        ) NOT NULL DEFAULT 'Pending'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Restore the original enum with coordinator statuses
        DB::statement("ALTER TABLE application_forms MODIFY COLUMN status ENUM(
            'Pending',
            'Accepted by Admin',
            'Rejected by Admin',
            'Accepted by Assessor',
            'Rejected by Assessor',
            'Accepted by Department Coordinator',
            'Rejected by Department Coordinator',
            'Accepted by College Coordinator',
            'Rejected by College Coordinator',
            'Final Admission List'
        ) NOT NULL DEFAULT 'Pending'");
    }
};
