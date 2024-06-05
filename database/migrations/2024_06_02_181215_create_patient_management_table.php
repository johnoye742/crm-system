<?php

use App\Models\Organisation;
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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table -> string('name');
            $table -> date('dob');
            $table -> enum('gender', ['male', 'female', 'custom']);
            $table -> json('emergency_contact');
            $table -> json('insurance_info');
            $table -> foreignIdFor(Organisation::class);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_management');
    }
};
