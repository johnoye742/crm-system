<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'dob',
        'gender',
        'emergency_contact',
        'insurance_info',
        'organisation_id'
    ];

    public function records() {
        return $this -> hasMany(MedicalRecord::class);
    }
}
