@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2>Dashboard</h2>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-header">Total Equipments</div>
                        <div class="card-body">
                            <h4 class="card-title">{{ $equipmentsCount }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-warning mb-3">
                        <div class="card-header">Pending Incidents</div>
                        <div class="card-body">
                            <h4 class="card-title">{{ $pendingIncidents }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-danger mb-3">
                        <div class="card-header">Total Incidents</div>
                        <div class="card-body">
                            <h4 class="card-title">{{ $incidentsCount }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('equipments.index') }}" class="btn btn-primary">Manage Equipments</a>
                <a href="{{ route('incidents.index') }}" class="btn btn-secondary">Manage Incidents</a>
            </div>
        </div>
    </div>
</div>
@endsection
