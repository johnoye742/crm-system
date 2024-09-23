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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table -> json("organisations") -> nullable(true);
            $table -> json('roles') -> nullable(true);
            $table -> json('niches') -> nullable(true);
            $table -> date('dob');
            $table -> enum('gender', ['male', 'female', 'custom']);
            $table -> text('emergency_contact') -> nullable();
            $table -> text('address') -> nullable();
            $table -> text('phone') -> nullable();
            $table -> text('occupation') -> nullable();
            $table -> text('state_of_origin') -> nullable();
            $table -> integer("current_organisation") -> nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
