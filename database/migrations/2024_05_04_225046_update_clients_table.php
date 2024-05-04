<?php

use App\Models\Organisation;
use App\Models\Property;
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
        //
        Schema::table('clients', function (Blueprint $table) {
            $table -> foreignIdFor(Property::class, 'property_id');
            $table -> foreignIdFor(Organisation::class, 'organisation_id');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
