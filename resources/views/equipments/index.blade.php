@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Manajemen Peralatan Elektronik</h2>
    <a href="{{ route('equipments.create') }}" class="btn btn-primary mb-3">Tambah Peralatan</a>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Peralatan</th>
                        <th>Serial Number</th>
                        <th>Lokasi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($equipments as $equipment)
                    <tr>
                        <td>{{ $equipment->id }}</td>
                        <td>{{ $equipment->name }}</td>
                        <td>{{ $equipment->serial_number }}</td>
                        <td>{{ $equipment->location }}</td>
                        <td>
                            <span class="badge {{ $equipment->status == 'active' ? 'bg-success' : ($equipment->status == 'maintenance' ? 'bg-warning' : 'bg-danger') }}">
                                {{ ucfirst($equipment->status) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('equipments.edit', $equipment->id) }}" class="btn btn-sm btn-info text-white">Edit</a>
                            <form action="{{ route('equipments.destroy', $equipment->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus peralatan ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
