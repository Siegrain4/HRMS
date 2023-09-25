@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="list-group">
                <a href="{{ route('daftar-karyawan') }}" class="list-group-item">Informasi Karyawan</a>
                <a href="{{ route('list-nama-gaji') }}" class="list-group-item">Lihat Gaji Karyawan</a>
            </div>
        </div>
        <!-- Konten Utama -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Data Karyawan') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
        {{-- Batas Konten Tengah--}}
    </div>
</div>
@endsection
