@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="list-group">
                <a href="{{ route('informasi-karyawan') }}" class="list-group-item">Informasi Karyawan</a>
                <a href="{{ route('list-nama-gaji') }}" class="list-group-item">Lihat Gaji Karyawan</a>
                <!-- Tambahkan menu lain jika diperlukan -->
            </div>
        </div>
    </div>
</div>
@endsection
