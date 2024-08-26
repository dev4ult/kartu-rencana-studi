<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Rencana Studi</title>
</head>

<body>
    <a href="{{ route('index') }}">kembali</a>
    <br />
    <br />
    <div>
        <input type="text" placeholder="Nama Mahasiswa" name="nama_mahasiswa" value="{{ $data['nama_mahasiswa'] }}" />
        <br />
        <input type="text" placeholder="NPM" name="npm" value="{{ $data['npm'] }}" />
        <br />
        <input type="number" placeholder="Semester" name="semester" value="{{ $data['semester'] }}" />
        <br />
        <input type="number" placeholder="Tingkat" name="tingkat" value="{{ $data['tingkat'] }}" />
        <br />
        <input type="number" placeholder="Angkatan" name="angkatan" value="{{ $data['angkatan'] }}" />
        <br />
    </div>
    <br />
    <br />

    <h1>Mata Kuliah yang diambil</h1>
    <table border="1">
        <thead>
            <tr>
                <td>No</td>
                <td>Kode MK</td>
                <td>Mata Kuliah</td>
                <td>Beban SKS</td>
                <td>Keterangan</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($matkul_mhsw as $index => $matkulAssigned)

            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $matkulAssigned['kode_mk'] }}</td>
                <td>{{ $matkulAssigned['nama_matkul'] }}</td>
                <td>{{ $matkulAssigned['beban_sks'] }}</td>
                <td>{{ $matkulAssigned['keterangan'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>