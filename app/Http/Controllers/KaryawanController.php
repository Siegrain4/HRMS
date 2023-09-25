<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::all();
        return view('karyawan.index', compact('karyawan'));
    }

    public function listNamaGaji()
    {
        $karyawan = Karyawan::select('nama', 'total_gaji')->get();

        return view('salary.index', compact('karyawan'));
    }

    public function create()
    {
        return view('karyawan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'jabatan' => 'required|string|max:255',
            'status' => 'required|in:Tetap,Kontrak,HL',
            'gaji_pokok' => 'required|numeric',
            'tunjangan' => 'required|numeric',
        ]);

        Karyawan::create($request->all());

        return redirect('/karyawan')->with('success', 'Data karyawan berhasil ditambahkan.');
    }

    public function show($id)
    {
        $karyawan = Karyawan::find($id);
        return view('karyawan.show', compact('karyawan'));
    }

    public function edit($id)
    {
        $karyawan = Karyawan::find($id);
        return view('karyawan.edit', compact('karyawan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'jabatan' => 'required|string|max:255',
            'status' => 'required|in:Tetap,Kontrak,HL',
            'gaji_pokok' => 'required|numeric',
            'tunjangan' => 'required|numeric',
        ]);

        Karyawan::where('id', $id)->update($request->all());

        return redirect('/karyawan')->with('success', 'Data karyawan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Karyawan::destroy($id);

        return redirect('/karyawan')->with('success', 'Data karyawan berhasil dihapus.');
    }

    // public function calculateSalary($id)
    // {
    //     $karyawan = Karyawan::find($id);

    // if (!$karyawan) {
    //     return redirect('/karyawan')->with('error', 'Karyawan tidak ditemukan.');
    // }

    // $gaji_pokok = $karyawan->gaji_pokok;
    // $tunjangan_tetap = $karyawan->tunjangan;
    // $insentif = 0;
    // $lembur = 0;

    // if ($karyawan->status === 'Tetap' && $karyawan->masa_kerja >= 1) {
    //     $insentif = 1000000 + ($karyawan->masa_kerja - 1) * 100000;
    // }

    // $upah_lembur_per_jam = ($karyawan->status === 'Tetap' || $karyawan->status === 'Kontrak')
    //     ? ($gaji_pokok + $tunjangan_tetap) / 173
    //     : $gaji_pokok / 173;

    // $jam_lembur = max($karyawan->jam_kerja - 4, 0);
    // $upah_lembur = $upah_lembur_per_jam * $jam_lembur;

    // $nwbp = 0;
    // if ($karyawan->masa_kerja >= 1 && !$karyawan->cuti) {
    //     $hari_tidak_hadir = $karyawan->hitungHariTidakHadir();
    //     $nwbp = ($hari_tidak_hadir * $gaji_pokok) / 30;
    // }

    // $potongan_bpjs = ($gaji_pokok + $tunjangan_tetap) * 0.03;

    // $total_gaji = $gaji_pokok + $tunjangan_tetap + $insentif + $lembur - $nwbp - $potongan_bpjs;

    // return view('karyawan.salary', compact('karyawan', 'gaji_pokok', 'tunjangan_tetap', 'insentif', 'upah_lembur', 'nwbp', 'potongan_bpjs', 'total_gaji'));
    // }

    public function calculateSalary($id)
    {
        $karyawan = Karyawan::find($id);

        if (!$karyawan) {
            return redirect('/karyawan')->with('error', 'Karyawan tidak ditemukan.');
        }

        $gaji_pokok = $karyawan->gaji_pokok;
        $tunjangan_tetap = $karyawan->tunjangan;
        $insentif = $karyawan->insentif;
        $lembur = 0;

        if ($karyawan->status === 'Tetap' && $karyawan->masa_kerja >= 1) {
            $insentif = 1000000 + ($karyawan->masa_kerja - 1) * 100000;
        }

        $upah_lembur_per_jam = ($karyawan->status === 'Tetap' || $karyawan->status === 'Kontrak')
            ? ($gaji_pokok + $tunjangan_tetap) / 173
            : $gaji_pokok / 173;

        $jam_lembur = max($karyawan->jam_kerja - 4, 0);
        $upah_lembur = $upah_lembur_per_jam * $jam_lembur;

        $nwbp = $karyawan->nwbp; // Ambil nilai nwbp dari kolom nwbp di tabel

        $potongan_bpjs = ($gaji_pokok + $tunjangan_tetap) * 0.03;

        $total_gaji = $gaji_pokok + $tunjangan_tetap + $insentif + $lembur - $nwbp - $potongan_bpjs;

        return view('karyawan.salary', compact('karyawan', 'gaji_pokok', 'tunjangan_tetap', 'insentif', 'upah_lembur', 'nwbp', 'potongan_bpjs', 'total_gaji'));
    }


    public function salaryOverview()
    {

        $karyawan = Karyawan::all();
        return view('karyawan.overview', compact('karyawan'));
    }

//     public function editGaji($id)
// {
//     $karyawan = Karyawan::find($id);

//     if (!$karyawan) {
//         return redirect('/karyawan')->with('error', 'Karyawan tidak ditemukan.');
//     }

//     // Lakukan perhitungan Insentif, Upah Lembur, dan NWBP seperti pada contoh sebelumnya
//     $gaji_pokok = $karyawan->gaji_pokok;
//     $tunjangan_tetap = $karyawan->tunjangan;
//     $insentif = 0;
//     $lembur = 0;

//     if ($karyawan->status === 'Tetap' && $karyawan->masa_kerja >= 1) {
//         $insentif = 1000000 + ($karyawan->masa_kerja - 1) * 100000;
//     }

//     $upah_lembur_per_jam = ($karyawan->status === 'Tetap' || $karyawan->status === 'Kontrak')
//         ? ($gaji_pokok + $tunjangan_tetap) / 173
//         : $gaji_pokok / 173;

//     $jam_lembur = max($karyawan->jam_kerja - 4, 0);
//     $upah_lembur = $upah_lembur_per_jam * $jam_lembur;

//     $nwbp = 0;
//     if ($karyawan->masa_kerja >= 1 && !$karyawan->cuti) {
//         $hari_tidak_hadir = $karyawan->hitungHariTidakHadir();
//         $nwbp = ($hari_tidak_hadir * $gaji_pokok) / 30;
//     }

//     $potongan_bpjs = ($gaji_pokok + $tunjangan_tetap) * 0.03;

//     $total_gaji = $gaji_pokok + $tunjangan_tetap + $insentif + $lembur - $nwbp - $potongan_bpjs;

//     // Mengirim data ke view
//     return view('salary.edit', compact('karyawan', 'gaji_pokok', 'tunjangan_tetap', 'insentif', 'upah_lembur', 'nwbp', 'potongan_bpjs', 'total_gaji'));
// }

public function editGaji($id)
{
    $karyawan = Karyawan::find($id);

    if (!$karyawan) {
        return redirect('/karyawan')->with('error', 'Karyawan tidak ditemukan.');
    }

    return view('salary.edit', compact('karyawan'));
}



    public function updateGaji(Request $request, $id)
    {
        $karyawan = Karyawan::find($id);

        if (!$karyawan) {
            return redirect('/karyawan')->with('error', 'Karyawan tidak ditemukan.');
        }

        $request->validate([
            'insentif' => 'numeric',
            'upah_lembur' => 'numeric',
            'nwbp' => 'numeric',
        ]);

        $karyawan->insentif = $request->input('insentif');
        $karyawan->upah_lembur = $request->input('upah_lembur');
        $karyawan->nwbp = $request->input('nwbp');

        $karyawan->save();

        return redirect()->route('calculate-salary', $karyawan->id)->with('success', 'Data gaji karyawan berhasil diperbarui.');
    }

    public function updateInsentif(Request $request, $id)
    {
        $validatedData = $request->validate([
            'insentif' => 'required|numeric',
        ]);

        $karyawan = Karyawan::find($id);

        if (!$karyawan) {
            return redirect('/karyawan')->with('error', 'Karyawan tidak ditemukan.');
        }

        $karyawan->insentif = $request->input('insentif');
        $karyawan->save();

        return redirect()->route('karyawan.salary', $karyawan->id)->with('success', 'Insentif berhasil diperbarui.');
    }


    public function detailGaji($id)
{
    $karyawan = Karyawan::find($id);

    if (!$karyawan) {
        return redirect('/karyawan')->with('error', 'Karyawan tidak ditemukan.');
    }

    $gaji_pokok = $karyawan->gaji_pokok;
    $tunjangan_tetap = $karyawan->tunjangan;
    $insentif = 0;
    $lembur = 0;

    if ($karyawan->status === 'Tetap' && $karyawan->masa_kerja >= 1) {
        $insentif = 1000000 + ($karyawan->masa_kerja - 1) * 100000;
    }

    $upah_lembur_per_jam = ($karyawan->status === 'Tetap' || $karyawan->status === 'Kontrak')
        ? ($gaji_pokok + $tunjangan_tetap) / 173
        : $gaji_pokok / 173;

    $jam_lembur = max($karyawan->jam_kerja - 4, 0);
    $upah_lembur = $upah_lembur_per_jam * $jam_lembur;

    $nwbp = 0;
    if ($karyawan->masa_kerja >= 1 && !$karyawan->cuti) {
        $hari_tidak_hadir = $karyawan->hitungHariTidakHadir();
        $nwbp = ($hari_tidak_hadir * $gaji_pokok) / 30;
    }

    $potongan_bpjs = ($gaji_pokok + $tunjangan_tetap) * 0.03;

    $total_gaji = $gaji_pokok + $tunjangan_tetap + $insentif + $lembur - $nwbp - $potongan_bpjs;

    return view('karyawan.salary', compact('karyawan', 'gaji_pokok', 'tunjangan_tetap', 'insentif', 'upah_lembur', 'nwbp', 'potongan_bpjs', 'total_gaji'));
}

}
