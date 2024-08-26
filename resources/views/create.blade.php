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
    <form action="{{ route('store') }}" method="POST">
        @csrf
        @method('POST')

        <h1>Form KRS Mahasiswa</h1>
        <div>
            <input type="text" placeholder="Nama Mahasiswa" name="nama_mahasiswa" />
            <br />
            <input type="text" placeholder="NPM" name="npm" />
            <br />
            <input type="number" placeholder="Semester" name="semester" />
            <br />
            <input type="number" placeholder="Tingkat" name="tingkat" />
            <br />
            <input type="number" placeholder="Angkatan" name="angkatan" />
            <br />
        </div>
        <br />
        <br />

        <h1>Mata Kuliah</h1>
        <table border="1">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Kode MK</td>
                    <td>Mata Kuliah</td>
                    <td>Beban SKS</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                @foreach ($matkul as $index => $mata_kuliah)

                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $mata_kuliah['kode_mk'] }}</td>
                    <td>{{ $mata_kuliah['nama_matkul'] }}</td>
                    <td>{{ $mata_kuliah['beban_sks'] }}</td>
                    <td>
                        <input type="checkbox" name="id_matkul_{{ $mata_kuliah['id'] }}" value="{{ $mata_kuliah['id'] }}" />
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br />
        <br />
        <button type="submit">Submit</button>
    </form>

</body>

</html>