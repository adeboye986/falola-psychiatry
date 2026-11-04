<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');

Route::view('/about', 'pages.placeholder', [
    'title' => 'About',
    'description' => 'Practice and physician content is awaiting review and approval.',
])->name('about');

Route::view('/services', 'pages.placeholder', [
    'title' => 'Services',
    'description' => 'Service summaries are awaiting clinical review and approval.',
])->name('services.index');

Route::view('/services/{service}', 'pages.placeholder', [
    'title' => 'Service Detail',
    'description' => 'This service page is reserved for reviewed and approved content.',
])->where('service', '[a-z0-9-]+')->name('services.show');

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
