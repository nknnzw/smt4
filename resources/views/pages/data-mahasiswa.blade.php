<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-
QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between">
            <h1>Data Mahasiswa</h1>
            <form action="{{ route('auth.logout') }}">
                @csrf
                <button class="btn btn-primary" type=”submit”>Logout</button>
            </form>
        </div>
        @if (session()->has('success'))
        <div class="container mt-4">
            <div class="alert alert-success" role="alert">
                {{ session()->get('success') }}
            </div>
        </div>
        @endif
        @if (session()->has('error'))
        <div class="container mt-4">
            <div class="alert alert-danger" role="alert">
                {{ session()->get('error') }}
            </div>
        </div>
        @endif
        <a href="{{ route('create') }}"><button class="btn btn-primary mb-2">Tambah Data</button></a>
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Mahasiswa</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($mahasiswas as $mahasiswa)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $mahasiswa->nama }}</td>
                            <td>{{ $mahasiswa->nim }}</td>
                            <td>{{ $mahasiswa->jurusan }}</td>
                            <td class="d-flex">
                                <a href="{{ route('edit', $mahasiswa->id) }}">
                                    <button class="btn btn-warning">Edit</button>
                                </a>
                                <form action="{{ route('destroy', $mahasiswa->id) }}" method="post">
                                    @csrf
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <th scope="row" class="text-center" colspan="5">Belum ada data tersedia</th>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    </body>
</html>