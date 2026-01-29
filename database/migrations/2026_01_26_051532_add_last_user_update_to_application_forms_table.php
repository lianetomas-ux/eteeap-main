<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('application_forms', function (Blueprint $table) {
            $table->timestamp('last_user_update')->nullable()->after('updated_at');
            $table->json('changes_log')->nullable()->after('last_user_update');
            $table->boolean('needs_review')->default(false)->after('changes_log');
            $table->string('previous_status')->nullable()->after('needs_review');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('application_forms', function (Blueprint $table) {
            $table->dropColumn(['last_user_update', 'changes_log', 'needs_review', 'previous_status']);
        });
    }
};
