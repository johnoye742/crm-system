<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'roles',
        'niche',
        'dob',
        'gender',
        'state_of_orgin',
        'occupation',
        'organisations',
        'phone',
        'emergency_contact',
        'address',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'organisations' => 'array',
        'roles' => 'array'
    ];

    public function organisation() : BelongsTo {

        return $this -> belongsTo(Organisation::class);
    }

    public function properties() : BelongsToMany {

        return $this -> belongsToMany(Property::class, foreignPivotKey: 'property_id', table: 'users_properties');
    }

    public function records() : HasMany {
        return $this -> hasMany(MedicalRecord::class, 'patient_id');
    }

    public function appointments() {
        return $this -> hasMany(PatientAppointment::class);
    }

    public function isAdmin() {
        if(strtolower($this -> role) == 'admin') {
            return true;
        }

        return false;
    }

    public function isDoctor() {
        return strtolower($this -> role) == 'health-care-doctor';
    }

    public function isReceptionist() {
        return strtolower($this -> role) == 'health-care-receptionist';
    }
}
