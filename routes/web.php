<?php

use App\Http\Controllers\PropertyController;
use App\Http\Middleware\EnsureAdmin;
use App\Livewire\AddClient;
use App\Livewire\AddEmployees;
use App\Livewire\AddOrganization;
use App\Livewire\AddPropertyPage;
use App\Livewire\AddPropertySale;
use App\Livewire\Dashboard;
use App\Livewire\EditEmployee;
use App\Livewire\EditProperty;
use App\Livewire\Employees;
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

Route::delete('/delete-property', [PropertyController::class, 'delete']); 



Route::middleware('auth') -> group(function () {
    Route::get("add-client", AddClient::class) -> name('add-client');
    
    Route::get('add-employees', AddEmployees::class)
    -> middleware(EnsureAdmin::class)
    -> name('employees.add');

    Route::get('employees', Employees::class) -> name('employees')
    -> middleware(EnsureAdmin::class);

    Route::get('employees/edit/{id}', EditEmployee::class) -> name('employees.edit');

    Route::get("add-property-sale", AddPropertySale::class) -> name('add-property-sales');
    
    Route::get("add-organization", AddOrganization::class)
    -> name('add-organization');

    Route::get('/real-estate/add-property', AddPropertyPage::class)
    -> name("add-property");
       
    Route::get('/dashboard', function () {
        $niche = Auth::user() -> niche;
        if($niche == 'real-estate') {
            return redirect() ->route('real-estate-dashboard');
        }
    }) -> name('dashboard');
    
    Route::get('/real-estate/dashboard', Dashboard::class)
    -> name('real-estate-dashboard');

    Route::get('/real-estate/edit-property/{id}', EditProperty::class)
    -> name('property.edit');
    
    Route::get("property-sales/{id}", PropertySales::class)
    -> name('property-sales');

});
