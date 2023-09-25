@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lihat Gaji Karyawan</h1>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        @foreach ($karyawan as $k)
            <li class="nav-item">
                <a class="nav-link" id="tab-{{ $k->id }}" data-toggle="tab" href="#gaji-{{ $k->id }}" role="tab" aria-controls="gaji-{{ $k->id }}" aria-selected="false">{{ $k->nama }}</a>
            </li>
        @endforeach
    </ul>

    <div class="tab-content" id="myTabContent">
        @foreach ($karyawan as $k)
            <div class="tab-pane fade" id="gaji-{{ $k->id }}" role="tabpanel" aria-labelledby="tab-{{ $k->id }}">
                <h2>Detail Gaji {{ $k->nama }}</h2>
                <table class="table">
                    <!-- Tampilkan informasi gaji karyawan di sini -->
                </table>
            </div>
        @endforeach
    </div>
</div>

<script>
    $(document).ready(function() {
        // Aktifkan tab pertama saat halaman dimuat
        $('#tab-{{ $karyawan[0]->id }}').tab('show');
    });
</script>
@endsection
