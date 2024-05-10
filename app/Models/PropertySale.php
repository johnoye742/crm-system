<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertySale extends Model
{
    use HasFactory;
    protected $fillable = [
        'property_id',
        'client_id',
        'organisation_id',
        'status'
    ];

    public function organisation() {
        return $this -> belongsTo(Organisation::class);
    }

    public function property() {
        return $this -> belongsTo(Property::class);
    }

    public function client() {
        return $this -> belongsTo(Client::class);
    }
}
