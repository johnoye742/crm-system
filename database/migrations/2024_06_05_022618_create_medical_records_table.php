<?php

use App\Models\Patient;
use App\Models\User;
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
        Schema::create('medical_records', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table -> foreignIdFor(Patient::class);
            $table -> foreignIdFor(User::class);
            $table -> date('visit_date');
            $table -> text('visit_reason');
            $table -> text('diagnosis');
            $table -> text('treatment');
            $table -> text('notes');
            $table -> date('follow_up_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_records');
    }
};
