<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $equipmentsCount = \App\Models\Equipment::count();
        $incidentsCount = \App\Models\Incident::count();
        $pendingIncidents = \App\Models\Incident::where('status', 'pending')->count();
        
        return view('dashboard', compact('equipmentsCount', 'incidentsCount', 'pendingIncidents'));
    }
}
