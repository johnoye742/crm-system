<?php

use App\Http\Controllers\PropertyController;
use App\Http\Middleware\EnsureAdmin;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Livewire\AddClient;
use App\Livewire\AddEmployees;
use App\Livewire\AddOrganization;
use App\Livewire\AddPatient;
use App\Livewire\AddPropertyPage;
use App\Livewire\AddPropertySale;
use App\Livewire\Dashboard;
use App\Livewire\EditEmployee;
use App\Livewire\EditProperty;
use App\Livewire\Employees;
use App\Livewire\HealthCare\AddAppointments;
use App\Livewire\HealthCare\AddMedicalRecords;
use App\Livewire\HealthCare\Patients;
use App\Livewire\HealthCare\ViewPatientData;
use App\Livewire\HealthCareDashboard;
use App\Livewire\SignUp;
use App\Livewire\Login;
use App\Livewire\PropertySales;
use App\Livewire\RealEstate\ViewProperties;
use App\Livewire\ViewEmployee;
use App\Livewire\ViewProperty;
use App\Models\MedicalRecord;
use App\Models\Patient;
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

Route::get('/register', SignUp::class) -> name('register')
                                       -> middleware(RedirectIfAuthenticated::class);

Route::get('/login', Login::class) -> name('login')
                                   -> middleware(RedirectIfAuthenticated::class);

Route::delete('/delete-property', [PropertyController::class, 'delete']);



Route::middleware('auth') -> group(function () {
    Route::get("add-client", AddClient::class) -> name('add-client');

    Route::get('add-employees', AddEmployees::class)
    -> middleware(EnsureAdmin::class)
    -> name('employees.add')
    -> can('add-employees');



    Route::get('employees', Employees::class) -> name('employees')
    -> middleware(EnsureAdmin::class);

    Route::get('employees/{email}', ViewEmployee::class);

    Route::get('employees/edit/{id}', EditEmployee::class) -> name('employees.edit');

    Route::get("add-property-sale", AddPropertySale::class) -> name('add-property-sales');

    Route::get("add-organization", AddOrganization::class)
    -> name('add-organization');

    Route::get('/real-estate/add-property', AddPropertyPage::class)
    -> name("add-property");

    Route::get('/dashboard', function () {
        $niche = Auth::user() -> niche;
        switch($niche) {
            case 'real-estate':
                return redirect() -> route('real-estate.dashboard');
            break;
            case 'health-care':
                return redirect() -> route('health-care.dashboard');
            break;
        }
    }) -> name('dashboard');
    Route::prefix('real-estate') -> group(function () {

        Route::get('dashboard', Dashboard::class)
        -> name('real-estate.dashboard');

        Route::get('/edit-property/{id}', EditProperty::class)
        -> name('property.edit');

        Route::get('/property/{property}', ViewProperty::class)
        -> name('property.view');

        Route::get("/properties", ViewProperties::class)
        -> name('real-estate.properties');

        Route::get("property-sales/{id}", PropertySales::class)
        -> name('property-sales');

    });

    Route::prefix('health-care') -> group(function () {

        Route::get('dashboard', HealthCareDashboard::class)
            -> name('health-care.dashboard');

        Route::get('patients', Patients::class)
            -> name('health-care.patients');

        Route::get('add-patient', AddPatient::class)
        -> name('health-care.add-patient')
        -> can('create', Patient::class);

        Route::get('add-medical-records/{id?}', AddMedicalRecords::class)
        -> name('health-care.add-medical-records')
        -> can('create', MedicalRecord::class);

        Route::get('add-medical-appointments', AddAppointments::class)
        -> name('health-care.add-appointments');

        Route::get('patients/{patient}', ViewPatientData::class)
        -> name("health-care.view-patient")
       ;
    });

});

Route::get('/hey', function ($str) {
    return $str;
});
