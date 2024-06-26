<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientAppointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'patient_id',
        'scheduled_for',
        'info'
    ];

    public function patient() {
        return $this -> belongsTo(Patient::class);
    }

    public function doctor() {
        return $this -> belongsTo(User::class, 'user_id');
    }
}
