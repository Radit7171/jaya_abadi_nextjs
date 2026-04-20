<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        .container{
            margin-top: 100px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-center align-items-center row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header bg-black">
                        <h2 class="h2 fw-bold text-light text-center">Tambah Data User</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('aksi_tambah_user_crud') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="name">Nama :</label>
                                <input type="text" name="name" id="name" class="form-control mt-1">
                            </div>
                            <div class="mb-3">
                                <label for="email">Email :</label>
                                <input type="email" name="email" id="email" class="form-control mt-1">
                            </div>
                            <div class="mb-3">
                                <label for="password">Password :</label>
                                <input type="password" name="password" id="password" class="form-control mt-1">
                            </div>
                            <div class="mb-3">
                                <label for="role">Role :</label>
                                <select name="role" id="role" class="form-select mt-1">
                                    <option value="admin">Admin</option>
                                    <option value="teknisi">Teknisi</option>
                                    <option value="user" selected>User</option>
                                </select>
                            </div>
                            <div class="justify-content-center d-flex">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
