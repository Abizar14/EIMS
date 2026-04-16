@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Lapor Gangguan Peralatan</h2>
    <a href="{{ route('incidents.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('incidents.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Peralatan Elektronik</label>
                    <select name="equipment_id" class="form-select @error('equipment_id') is-invalid @enderror" required>
                        <option value="">-- Pilih Peralatan --</option>
                        @foreach($equipments as $equipment)
                            <option value="{{ $equipment->id }}" {{ old('equipment_id') == $equipment->id ? 'selected' : '' }}>
                                {{ $equipment->name }} ({{ $equipment->location }})
                            </option>
                        @endforeach
                    </select>
                    @error('equipment_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3">
                    <label>Deskripsi Gangguan</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4" required>{{ old('description') }}</textarea>
                    @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <button type="submit" class="btn btn-primary">Kirim Laporan</button>
            </form>
        </div>
    </div>
</div>
@endsection
