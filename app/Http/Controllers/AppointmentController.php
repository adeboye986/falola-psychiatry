<?php

namespace App\Http\Controllers;

use App\Support\TebraIntegration;
use Illuminate\Http\Response;

class AppointmentController extends Controller
{
    public function index(TebraIntegration $tebra): Response
    {
        $schedulerUrl = $tebra->schedulerUrl();
        $iframeEnabled = $tebra->shouldEmbedScheduler();
        $headers = [
            'Referrer-Policy' => 'no-referrer',
        ];

        if ($iframeEnabled && ($schedulerOrigin = $tebra->schedulerOrigin()) !== null) {
            $headers['Content-Security-Policy'] = "frame-src {$schedulerOrigin};";
        }

        return response()->view('appointments', [
            'iframeEnabled' => $iframeEnabled,
            'schedulerTimeoutMs' => $tebra->schedulerTimeoutMs(),
            'schedulerUrl' => $schedulerUrl,
        ], headers: $headers);
    }
}
