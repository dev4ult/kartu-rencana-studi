<?php

use App\Models\FormKrsMahasiswa;
use App\Models\MataKuliah;
use App\Models\MatkulMahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function (Request $request) {
    $nama = $request->query('mahasiswa');
    $npm = $request->query('npm');
    $orderAngkatan = $request->query('angkatan', 'asc');

    $krs = [];

    if (!$nama && !$npm) {
        $krs = new FormKrsMahasiswa();
    }

    if ($nama) {
        $krs = FormKrsMahasiswa::where('nama_mahasiswa', 'LIKE', '%' . $nama . '%');
    }

    if ($npm) {
        $krs = FormKrsMahasiswa::where('npm', 'LIKE', '%' . $npm . '%');
    }

    if ($orderAngkatan == 'asc' || $orderAngkatan == 'desc') {
        $krs = $krs->orderBy('angkatan', $orderAngkatan);
    }

    $krs = $krs->get();
    return view('index', [
        'krs' => $krs
    ]);
})->name('index');

Route::get('/create', function () {
    $matkul = MataKuliah::get();

    return view('create', [
        'matkul' => $matkul,
    ]);
})->name('create');

Route::post('/store', function (Request $request) {
    $matkul = MataKuliah::get();

    // dd($request->all());

    $insert = FormKrsMahasiswa::create([
        'id_prodi' => $request->input('id_prodi'),
        'nama_mahasiswa' => $request->input('nama_mahasiswa'),
        'semester' => $request->input('semester'),
        'npm' => $request->input('npm'),
        'tingkat' => $request->input('tingkat'),
        'angkatan' => $request->input('angkatan'),
    ]);

    if (!$insert) {
        dd('error');
    }

    foreach ($matkul as $mata_kuliah) {
        if ($request->input('id_matkul_' . $mata_kuliah['id'])) {
            MatkulMahasiswa::create([
                'id_krs' => $insert->id,
                'id_matkul' => $mata_kuliah['id']
            ]);
        }
    }

    return redirect(route('index'));
})->name('store');

Route::get('/show/{id}', function (String $id) {
    $data = FormKrsMahasiswa::find($id);

    if (!$data) {
        return route('index');
    }

    $matkulMhsw = MatkulMahasiswa::select('matkul_mahasiswa.id as matkul_mhsw_id', 'id_matkul', 'matkul_mahasiswa.id as id', 'kode_mk', 'nama_matkul', 'beban_sks', 'keterangan')
        ->where('id_krs', $id)
        ->join('form_krs_mahasiswa', 'form_krs_mahasiswa.id', '=', 'matkul_mahasiswa.id_krs')
        ->join('mata_kuliah', 'mata_kuliah.id', '=', 'matkul_mahasiswa.id_matkul')
        ->get();

    return view('show', [
        'data' => $data,
        'matkul_mhsw' => $matkulMhsw
    ]);
})->name('show');

Route::get('/edit/{id}', function (String $id) {
    $data = FormKrsMahasiswa::find($id);

    if (!$data) {
        return route('index');
    }

    $matkulMhsw = MatkulMahasiswa::select('matkul_mahasiswa.id as matkul_mhsw_id', 'id_matkul', 'matkul_mahasiswa.id as id', 'kode_mk', 'nama_matkul', 'beban_sks', 'keterangan')
        ->where('id_krs', $id)
        ->join('form_krs_mahasiswa', 'form_krs_mahasiswa.id', '=', 'matkul_mahasiswa.id_krs')
        ->join('mata_kuliah', 'mata_kuliah.id', '=', 'matkul_mahasiswa.id_matkul')
        ->get();

    $matkul = MataKuliah::get();

    foreach ($matkul as $index => $mata_kuliah) {
        foreach ($matkulMhsw as $punyaMhsw) {
            $matkul[$index]['assigned'] = false;
            if ($punyaMhsw['id_matkul'] == $mata_kuliah['id']) {
                $matkul[$index]['assigned'] = true;
                break;
            }
        }
    }

    return view('edit', [
        'id_krs' => $id,
        'data' => $data,
        'matkul' => $matkul,
        'matkul_mhsw' => $matkulMhsw
    ]);
})->name('edit');

Route::post('/assign-matkul', function (Request $request) {
    $data = FormKrsMahasiswa::find($request->input('id_krs'));

    if (!$data) {
        dd('error');
    }

    $matkul = MataKuliah::find($request->input('id_matkul'));

    if (!$matkul) {
        dd('error');
    }

    unset($request['_method']);
    unset($request['_token']);

    if (MatkulMahasiswa::create($request->all())) {
        return redirect(route('edit', ['id' => $request->input('id_krs')]));
    }

    dd('error');
})->name('assign-matkul');

Route::put('/update/{id}', function (Request $request, String $id) {
    $data = FormKrsMahasiswa::find($id);

    if (!$data) {
        dd('error');
    }

    $requestData = $request->all();

    unset($requestData['_method']);
    unset($requestData['_token']);

    if (FormKrsMahasiswa::where('id', $id)->update($requestData)) {
        return redirect(route('edit', ['id' => $id]));
    }

    dd('error');
})->name('update');

Route::delete('/delete/{id}', function (String $id) {
    $data = FormKrsMahasiswa::find($id);

    if (!$data) {
        dd('error');
    }

    FormKrsMahasiswa::destroy($id);

    return redirect(route('index'));
})->name('delete');

Route::delete('/delete-matkul-mhsw/{id}', function (Request $request, String $id) {
    $data = MatkulMahasiswa::find($id);

    if (!$data) {
        return route('index');
    }

    if (MatkulMahasiswa::destroy($id)) {
        return redirect(route('edit', ['id' => $request->input('id_krs')]));
    }

    dd('error');
})->name('delete-matkul-mhsw');
