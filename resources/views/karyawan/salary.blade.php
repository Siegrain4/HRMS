@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detail Gaji Karyawan</h1>
        <a href="{{ route('edit-gaji-karyawan', $karyawan->id) }}" class="btn btn-warning">Edit</a>
    <table class="table">
        <table class="table">
            <tr>
                <th>Nama</th>
                <td>{{ $karyawan->nama }}</td>
            </tr>
            <tr>
                <th>Gaji Pokok</th>
                <td>Rp {{ number_format($gaji_pokok, 2) }}</td>
            </tr>
            <tr>
                <th>Tunjangan Tetap</th>
                <td>Rp {{ number_format($tunjangan_tetap, 2) }}</td>
            </tr>
            <tr>
                <th>Insentif</th>
                <td>Rp {{ number_format($insentif, 2) }}</td>
            </tr>
            <tr>
                <th>Upah Lembur</th>
                <td>Rp {{ number_format($upah_lembur, 2) }}</td>
            </tr>
            <tr>
                <th>Potongan NWNP</th>
                <td>Rp {{ number_format($nwbp, 2) }}</td>
            </tr>
            <tr>
                <th>Potongan BPJS</th>
                <td>Rp {{ number_format($potongan_bpjs, 2) }}</td>
            </tr>
            <tr>
                <th>Total Gaji</th>
                <td>Rp {{ number_format($total_gaji, 2) }}</td>
            </tr>
        </table>
    </div>
@endsection
