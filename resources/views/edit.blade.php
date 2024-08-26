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
    <form action="{{ route('update', ['id' => $data['id']]) }}" method="POST">
        @csrf
        @method('PUT')

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
        <button type="submit">simpan perubahan</button>
    </form>
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
                <td></td>
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
                <td>
                    <form action="{{ route('delete-matkul-mhsw', ['id' => $matkulAssigned['matkul_mhsw_id']]) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <input type="hidden" name="id_krs" value="{{ $id_krs }}" />

                        <button>delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
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
                    @if (!$mata_kuliah['assigned'])
                    <form action="{{ route('assign-matkul') }}" method="POST">
                        @method('POST')
                        @csrf

                        <input type="hidden" value="{{ $mata_kuliah['id'] }}" name="id_matkul" />
                        <input type="hidden" value="{{ $id_krs }}" name="id_krs" />
                        <button>assign</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>