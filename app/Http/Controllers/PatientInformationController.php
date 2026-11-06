<?php

namespace App\Http\Controllers;

use App\Support\TebraIntegration;
use Illuminate\Contracts\View\View;

class PatientInformationController extends Controller
{
    public function index(TebraIntegration $tebra): View
    {
        return view('patient-information', [
            'patientPortalUrl' => $tebra->portalUrl(),
        ]);
    }
}
