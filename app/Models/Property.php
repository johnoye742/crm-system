<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_name',
        'property_price',
        'property_location',
        'property_info',
        'user_id',
        'organisation_id'
    ];

    public function user() {

        return $this -> belongsToMany(User::class, foreignPivotKey: 'user_id');
    }
}
