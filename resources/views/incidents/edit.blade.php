@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Penanganan Gangguan</h2>
    <a href="{{ route('incidents.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    <div class="card mb-4">
        <div class="card-header bg-light">
            <strong>Detail Laporan</strong>
        </div>
        <div class="card-body">
            <p><strong>Peralatan:</strong> {{ $incident->equipment->name }} ({{ $incident->equipment->location }})</p>
            <p><strong>Pelapor:</strong> {{ $incident->reporter->name ?? '-' }} ({{ $incident->created_at->format('d M Y H:i') }})</p>
            <p><strong>Deskripsi:</strong> {{ $incident->description }}</p>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('incidents.update', $incident->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label>Status Penanganan</label>
                    <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                        <option value="pending" {{ old('status', $incident->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="in_progress" {{ old('status', $incident->status) == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="waiting_parts" {{ old('status', $incident->status) == 'waiting_parts' ? 'selected' : '' }}>Waiting Parts</option>
                        <option value="resolved" {{ old('status', $incident->status) == 'resolved' ? 'selected' : '' }}>Resolved</option>
                    </select>
                    @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3">
                    <label>Catatan Penanganan</label>
                    <textarea name="resolution_notes" class="form-control @error('resolution_notes') is-invalid @enderror" rows="4">{{ old('resolution_notes', $incident->resolution_notes) }}</textarea>
                    @error('resolution_notes')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <button type="submit" class="btn btn-primary">Update Penanganan</button>
            </form>
        </div>
    </div>
</div>
@endsection
