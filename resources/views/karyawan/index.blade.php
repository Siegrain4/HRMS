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
            <h1>Data Karyawan</h1>

            <!-- Tombol Tambah Karyawan -->
            <a href="{{ route('tambah-karyawan') }}" class="btn btn-success">Tambah Karyawan</a>

            <table class="table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Jabatan</th>
                        <th>Status</th>
                        <th>Aksi</th> <!-- Kolom baru untuk tombol Edit dan Delete -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($karyawan as $k)
                        <tr>
                            <td>{{ $k->nama }}</td>
                            <td>{{ $k->tempat_lahir }}</td>
                            <td>{{ $k->tanggal_lahir }}</td>
                            <td>{{ $k->jenis_kelamin }}</td>
                            <td>{{ $k->jabatan }}</td>
                            <td>{{ $k->status }}</td>
                            <td>
                                <!-- Tombol Edit -->
                                <a href="{{ route('edit-karyawan', $k->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <!-- Tombol Update -->
                                <a href="{{ route('calculate-salary', $k->id) }}" class="btn btn-info btn-sm">Salary</a>
                                <!-- Tombol Delete -->
                                <form action="{{ route('hapus-karyawan', $k->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus karyawan ini?')">Delete</button>
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
