<?php

namespace App\Http\Controllers;

use App\Support\ServicePageCatalog;
use Illuminate\Contracts\View\View;

class ServiceController extends Controller
{
    public function show(string $service): View
    {
        $servicePage = ServicePageCatalog::find($service);

        abort_if($servicePage === null, 404);

        return view('services.show', [
            'service' => $servicePage,
            'serviceSlug' => $service,
        ]);
    }
}
