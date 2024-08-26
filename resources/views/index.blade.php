<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Rencana Studi</title>
    <style>
        td {
            padding: 4px;
        }
    </style>
</head>

<body>
    <form action="{{ route('index') }}" method="GET" style="display: inline;">
        <input type="text" name="mahasiswa" placeholder="Nama Mahasiswa" />
        <input type="text" name="npm" placeholder="NPM" />

        <button type="submit">Cari</button>
    </form>
    <a href="{{ route('index') }}" style="display: inline;">Refresh</a>
    <a href="{{ route('create') }}" style="display: inline;">Create Form KRS</a>
    <br>
    <br>

    <table border="1">
        <thead>
            <tr>
                <td>No</td>
                <td>Nama Mahasiswa</td>
                <td>NPM</td>
                <td>Tingkat</td>
                <td>Semester</td>
                <td>Angkatan
                    <a href="{{ route('index') . '?angkatan=asc' }}">asc</a>
                    <a href="{{ route('index') . '?angkatan=desc' }}">desc</a>
                </td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            @if (count($krs) == 0)
            <td colspan="7">Tidak ada data Mahasiswa</td>
            @endif
            @foreach ($krs as $index => $data)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $data['nama_mahasiswa'] }}</td>
                <td>{{ $data['npm'] }}</td>
                <td>{{ $data['tingkat'] }}</td>
                <td>{{ $data['semester'] }}</td>
                <td>{{ $data['angkatan'] }}

                </td>
                <td>
                    <a href="{{ route('edit', ['id' => $data['id']]) }}">Edit</a>
                    <a href="{{ route('show', ['id' => $data['id']]) }}">View</a>
                    <form action="{{ route('delete', ['id' => $data['id']]) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>