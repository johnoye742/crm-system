<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Organisation extends Model
{
    use HasFactory;
    public $fillable = [
        'name',
        'niche'
    ];

    public function employees() : HasMany {

        return $this -> hasMany(User::class, 'organisation_id');
    }

    public function properties() : HasMany {
        return $this -> hasMany(Property::class);
    }

    public function clients() : HasMany {
        return $this -> hasMany(Client::class);
    }
}
