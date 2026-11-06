<?php

use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');

Route::view('/about', 'about')->name('about');

Route::view('/services', 'services')->name('services.index');

Route::get('/services/{service}', [ServiceController::class, 'show'])
    ->where('service', '[a-z0-9-]+')
    ->name('services.show');

Route::view('/telepsychiatry', 'telepsychiatry')->name('telepsychiatry');

Route::view('/patient-information', 'patient-information')->name('patient-information');

Route::view('/appointments', 'pages.placeholder', [
    'title' => 'Appointments',
    'description' => 'Appointment options are not connected during Phase 1.',
])->name('appointments');

Route::view('/patient-portal', 'pages.placeholder', [
    'title' => 'Patient Portal',
    'description' => 'The patient portal is not connected during Phase 1.',
])->name('patient-portal');

Route::view('/contact', 'contact')->name('contact');
