@extends('layouts.app')

@section('content')
<div class="row">
    <!-- Sidebar -->
    <div class="col-md-3">
        <div class="list-group">
            <a href="{{ route('daftar-karyawan') }}" class="list-group-item">Daftar Karyawan</a>
            <a href="{{ route('lihat-gaji-karyawan') }}" class="list-group-item">Lihat Gaji Karyawan</a>
            <!-- Tambahkan menu lain jika diperlukan -->
        </div>
    </div>

    <!-- Konten Utama -->
    <div class="col-md-9">
        <h1>Edit Data Karyawan</h1>

        <form method="POST" action="{{ route('edit-karyawan', $karyawan->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $karyawan->nama }}">
            </div>

            <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ $karyawan->tempat_lahir }}">
            </div>

            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $karyawan->tanggal_lahir }}">
            </div>

            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                    <option value="Laki-laki" @if ($karyawan->jenis_kelamin === 'Laki-laki') selected @endif>Laki-laki</option>
                    <option value="Perempuan" @if ($karyawan->jenis_kelamin === 'Perempuan') selected @endif>Perempuan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ $karyawan->jabatan }}">
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status">
                    <option value="Tetap" @if ($karyawan->status === 'Tetap') selected @endif>Tetap</option>
                    <option value="Kontrak" @if ($karyawan->status === 'Kontrak') selected @endif>Kontrak</option>
                    <option value="HL" @if ($karyawan->status === 'HL') selected @endif>HL</option>
                </select>
            </div>

            <div class="form-group">
                <label for="gaji_pokok">Gaji Pokok</label>
                <input type="text" class="form-control" id="gaji_pokok" name="gaji_pokok" value="{{ $karyawan->gaji_pokok }}">
            </div>

            <div class="form-group">
                <label for="tunjangan">Tunjangan</label>
                <input type="text" class="form-control" id="tunjangan" name="tunjangan" value="{{ $karyawan->tunjangan }}">
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection
