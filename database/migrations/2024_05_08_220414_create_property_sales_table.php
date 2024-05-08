<?php

use App\Models\Client;
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
        Schema::create('property_sales', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table -> foreignIdFor(Client::class);
            $table -> foreignIdFor(Property::class);
            $table -> foreignIdFor(Organisation::class);
            $table -> enum('status', ['opened', 'closed', 'ongoing']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_sales');
    }
};
