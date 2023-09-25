@extends('layouts.app')

@section('content')
<div class="container">
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
            <h1>List Nama dan Gaji Pegawai</h1>

            <table class="table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Total Gaji</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($karyawan as $k)
                        <tr>
                            <td>{{ $k->nama }}</td>
                            <td>Rp {{ number_format($k->total_gaji, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
