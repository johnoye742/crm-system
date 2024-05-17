<?php

use App\Http\Controllers\PropertyController;
use App\Livewire\AddClient;
use App\Livewire\AddOrganization;
use App\Livewire\AddPropertyPage;
use App\Livewire\AddPropertySale;
use App\Livewire\Dashboard;
use App\Livewire\SignUp;
use App\Livewire\Login;
use App\Livewire\PropertySales;
use App\Models\Organisation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
}) -> name('homepage');

Route::get('/register', SignUp::class) -> name('register');

Route::get('/login', Login::class) -> name('login');

Route::get('/add-property', AddPropertyPage::class)
-> name("add-property")
-> middleware('auth');

Route::get('/dashboard', Dashboard::class)
-> name('dashboard')
-> middleware('auth');

Route::delete('/delete-property', [PropertyController::class, 'delete']); 

Route::get("add-organization", AddOrganization::class)
-> name('add-organization')
-> middleware('auth');

Route::get("add-property-sale", AddPropertySale::class)
-> middleware('auth')
-> name('add-property-sales');

Route::get("property-sales/{id}", PropertySales::class)
-> name('property-sales');

Route::get("add-client", AddClient::class)
    -> middleware('auth');

Route::get('employees', function() {
    $organisation = Organisation::find(Auth::user() -> organisation_id);


    dd($organisation -> name, $organisation -> employees);
});