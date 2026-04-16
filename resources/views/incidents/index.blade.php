@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Laporan Gangguan</h2>
    <a href="{{ route('incidents.create') }}" class="btn btn-primary mb-3">Lapor Gangguan</a>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Waktu Lapor</th>
                        <th>Peralatan</th>
                        <th>Pelapor</th>
                        <th>Status</th>
                        <th>Teknisi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($incidents as $incident)
                    <tr>
                        <td>{{ $incident->id }}</td>
                        <td>{{ $incident->created_at->format('d M Y H:i') }}</td>
                        <td>{{ $incident->equipment->name }}</td>
                        <td>{{ $incident->reporter->name ?? '-' }}</td>
                        <td>
                            @php
                                $badgeClass = 'bg-secondary';
                                if($incident->status == 'pending') $badgeClass = 'bg-warning text-dark';
                                elseif($incident->status == 'in_progress') $badgeClass = 'bg-primary';
                                elseif($incident->status == 'waiting_parts') $badgeClass = 'bg-info text-dark';
                                elseif($incident->status == 'resolved') $badgeClass = 'bg-success';
                            @endphp
                            <span class="badge {{ $badgeClass }}">{{ ucfirst(str_replace('_', ' ', $incident->status)) }}</span>
                        </td>
                        <td>{{ $incident->technician->name ?? 'Belum Ditangani' }}</td>
                        <td>
                            <a href="{{ route('incidents.edit', $incident->id) }}" class="btn btn-sm btn-info text-white">Lihat / Tangani</a>
                            <form action="{{ route('incidents.destroy', $incident->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus laporan ini?');">
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
