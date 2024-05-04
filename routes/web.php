<?php

use App\Livewire\AddOrganization;
use App\Livewire\AddPropertyPage;
use App\Livewire\Dashboard;
use App\Livewire\SignUp;
use App\Livewire\Login;
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

Route::get("add-organization", AddOrganization::class)
-> name('add-organization')
-> middleware('auth');