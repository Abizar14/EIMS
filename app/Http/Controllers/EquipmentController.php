<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    public function index()
    {
        $equipments = \App\Models\Equipment::all();
        return view('equipments.index', compact('equipments'));
    }

    public function create()
    {
        return view('equipments.create');
    }

    public function store(\Illuminate\Http\Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'serial_number' => 'nullable|string|max:255',
            'purchase_date' => 'nullable|date',
            'location' => 'required|string|max:255',
            'status' => 'required|in:active,maintenance,inactive',
        ]);

        \App\Models\Equipment::create($validated);
        return redirect()->route('equipments.index')->with('success', 'Equipment added successfully.');
    }

    public function edit(\App\Models\Equipment $equipment)
    {
        return view('equipments.edit', compact('equipment'));
    }

    public function update(\Illuminate\Http\Request $request, \App\Models\Equipment $equipment)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'serial_number' => 'nullable|string|max:255',
            'purchase_date' => 'nullable|date',
            'location' => 'required|string|max:255',
            'status' => 'required|in:active,maintenance,inactive',
        ]);

        $equipment->update($validated);
        return redirect()->route('equipments.index')->with('success', 'Equipment updated successfully.');
    }

    public function destroy(\App\Models\Equipment $equipment)
    {
        $equipment->delete();
        return redirect()->route('equipments.index')->with('success', 'Equipment deleted successfully.');
    }
}
