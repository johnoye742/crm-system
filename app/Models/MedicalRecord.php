<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'patient_id', 'user_id', 'visit_date', 'visit_reason', 'diagnosis', 'treatment', 'prescriptions', 'notes', 'follow_up_date'
    ];

    public function patient()
    {
        return $this -> belongsTo(Patient::class);
    }

    public function doctor()
    {
        return $this -> belongsTo(User::class, 'user_id');
    }
}
