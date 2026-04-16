@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Peralatan</h2>
    <a href="{{ route('equipments.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('equipments.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Nama Peralatan</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3">
                    <label>Serial Number</label>
                    <input type="text" name="serial_number" class="form-control" value="{{ old('serial_number') }}">
                </div>
                <div class="mb-3">
                    <label>Tanggal Pembelian</label>
                    <input type="date" name="purchase_date" class="form-control" value="{{ old('purchase_date') }}">
                </div>
                <div class="mb-3">
                    <label>Lokasi</label>
                    <input type="text" name="location" class="form-control @error('location') is-invalid @enderror" value="{{ old('location') }}" required>
                    @error('location')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3">
                    <label>Status</label>
                    <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="maintenance" {{ old('status') == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
