<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Service;
use App\Models\Document;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'applications' => Application::all(),
            'services' => Service::where('is_active', true)->get(),
            'documents' => Document::all()
        ]);
    }
}