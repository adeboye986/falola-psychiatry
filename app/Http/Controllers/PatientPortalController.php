<?php

namespace App\Http\Controllers;

use App\Support\TebraIntegration;
use Illuminate\Contracts\View\View;

class PatientPortalController extends Controller
{
    public function index(TebraIntegration $tebra): View
    {
        return view('patient-portal', [
            'patientPortalUrl' => $tebra->portalUrl(),
        ]);
    }
}
