@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Gaji Karyawan</h1>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <form method="POST" action="{{ route('update-gaji-karyawan', $karyawan->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="insentif">Insentif</label>
            <input type="text" class="form-control @error('insentif') is-invalid @enderror" id="insentif" name="insentif" value="{{ old('insentif', $karyawan->insentif) }}">
            @error('insentif')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="upah_lembur">Upah Lembur</label>
            <input type="text" class="form-control @error('upah_lembur') is-invalid @enderror" id="upah_lembur" name="upah_lembur" value="{{ old('upah_lembur', $karyawan->upah_lembur) }}">
            @error('upah_lembur')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="nwbp">Potongan NWNP</label>
            <input type="text" class="form-control @error('nwbp') is-invalid @enderror" id="nwbp" name="nwbp" value="{{ old('nwbp', $karyawan->nwbp) }}">
            @error('nwbp')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('calculate-salary', $karyawan->id) }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
