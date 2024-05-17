<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    //
    public function delete(Request $request) {
        Property::find($request -> id) -> delete();
    }
}
