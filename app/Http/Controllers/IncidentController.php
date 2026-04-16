<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IncidentController extends Controller
{
    public function index()
    {
        $incidents = \App\Models\Incident::with(['equipment', 'reporter', 'technician'])->get();
        return view('incidents.index', compact('incidents'));
    }

    public function create()
    {
        $equipments = \App\Models\Equipment::where('status', '!=', 'inactive')->get();
        return view('incidents.create', compact('equipments'));
    }

    public function store(\Illuminate\Http\Request $request)
    {
        $validated = $request->validate([
            'equipment_id' => 'required|exists:equipment,id',
            'description' => 'required|string',
        ]);

        $validated['reporter_id'] = auth()->id();
        $validated['status'] = 'pending';

        \App\Models\Incident::create($validated);
        return redirect()->route('incidents.index')->with('success', 'Incident reported successfully.');
    }

    public function edit(\App\Models\Incident $incident)
    {
        return view('incidents.edit', compact('incident'));
    }

    public function update(\Illuminate\Http\Request $request, \App\Models\Incident $incident)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,in_progress,waiting_parts,resolved',
            'resolution_notes' => 'nullable|string',
        ]);

        $validated['technician_id'] = auth()->id();
        
        if ($validated['status'] === 'resolved' && $incident->status !== 'resolved') {
            $validated['resolved_at'] = now();
        }

        $incident->update($validated);
        return redirect()->route('incidents.index')->with('success', 'Incident updated successfully.');
    }

    public function destroy(\App\Models\Incident $incident)
    {
        $incident->delete();
        return redirect()->route('incidents.index')->with('success', 'Incident deleted successfully.');
    }
}
