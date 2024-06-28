<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Week 11</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container text-center">
        <h1 style="margin-top: 1cm">View Table as Admin</h1>
        <h2 style="margin-bottom: 2cm">Data Pegawai</h2>
        <div class="d-flex justify-content-between mb-3">
            <a href="{{ route('tambah') }}" class="btn btn-primary text-left">Insert Data</a>
            <form action="{{ route('logout') }}" method="POST" class="text-right">
                @csrf
                <button type="submit" class="btn btn-secondary">Logout</button>
            </form>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pegawai as $p)
                    <tr>
                        <td>{{ $p->id }}</td>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->age }}</td>
                        <td>{{ $p->email }}</td>
                        <td>
                            <a href="{{ route('edit', ['id' => $p->id]) }}" class="btn btn-success">Edit</a>
                            <a href="{{ route('hapus', ['id' => $p->id]) }}" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
