<?php

use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');

Route::view('/about', 'about')->name('about');

Route::view('/services', 'services')->name('services.index');

Route::get('/services/{service}', [ServiceController::class, 'show'])
    ->where('service', '[a-z0-9-]+')
    ->name('services.show');

Route::view('/telepsychiatry', 'pages.placeholder', [
    'title' => 'Telepsychiatry',
    'description' => 'Telepsychiatry information is awaiting clinical and legal review.',
])->name('telepsychiatry');

Route::view('/patient-information', 'pages.placeholder', [
    'title' => 'Patient Information',
    'description' => 'Patient policies and resources are awaiting practice approval.',
])->name('patient-information');

Route::view('/appointments', 'pages.placeholder', [
    'title' => 'Appointments',
    'description' => 'Appointment options are not connected during Phase 1.',
])->name('appointments');

Route::view('/patient-portal', 'pages.placeholder', [
    'title' => 'Patient Portal',
    'description' => 'The patient portal is not connected during Phase 1.',
])->name('patient-portal');

Route::view('/contact', 'pages.placeholder', [
    'title' => 'Contact',
    'description' => 'Contact details and safe communication options are awaiting approval.',
])->name('contact');
