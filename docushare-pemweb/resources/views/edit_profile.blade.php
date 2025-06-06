<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perbarui Profil - DocuShare</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        body {
            max-width: 1200px;
            margin: 0 auto;
            overflow: hidden;
            background-color: #ffffff;
            font-family: 'Roboto', sans-serif;
            padding-top: 70px;
        }

        .navbar-custom {
            background-color: #fff;
            padding: 1rem 15px;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1030;
            margin: 0 auto;
            max-width: 1200px;
        }

        .navbar-brand-custom {
            font-weight: 700;
            font-size: 1.5rem;
            color: #333;
            text-decoration: none;
        }

        .user-greeting-container {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .user-greeting {
            font-size: 1rem;
            font-weight: 500;
            color: #555;
        }

        .settings-icon {
            font-size: 1.2rem;
            color: #333;
            text-decoration: none;
        }

        .settings-icon:hover {
            color: #0d6efd;
        }

        .hero {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 70px); /* Kurangi tinggi navbar fixed */
            padding: 20px;
        }

        .app-logo {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 30px;
            color: #333;
        }

        .card-form {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 40px;
            max-width: 450px;
            width: 100%;
            text-align: center;
        }

        .card-form h2 {
            margin-bottom: 30px;
            font-weight: 600;
            color: #333;
        }

        .form-label {
            text-align: left;
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
        }

        .form-control {
            border-radius: 8px;
            padding: 12px 15px;
            border: 1px solid #ced4da;
            background-color: #e9ecef;
        }

        .form-control[readonly] {
            background-color: #e9ecef;
            opacity: 1;
            cursor: default;
        }

        .form-control:focus {
            border-color: #86b7fe;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
            background-color: #fff;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-update {
            width: 100%;
            padding: 12px 15px;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-light navbar-custom fixed-top">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <a href="{{ route('home') }}" class="navbar-brand-custom">DocuShare</a>
            <div class="user-greeting-container">
                <span class="user-greeting">Halo, {{ Auth::check() ? Auth::user()->name : 'Tamu' }}!</span>
                <a href="{{ route('edit_profile') }}" class="settings-icon ms-2" title="Edit Profil"><i class="fa-solid fa-gear"></i></a>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="settings-icon ms-2" title="Logout"><i class="fa-solid fa-right-from-bracket"></i></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </nav>

    <div class="hero">
        <div class="card-form">
            <h2>Perbarui Datamu!</h2>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show w-100 mb-4" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show w-100 mb-4" role="alert">
                    Ada masalah saat memperbarui profil:
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', Auth::user()->name) }}" required>
                    @error('name')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', Auth::user()->email) }}" required>
                    @error('email')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Password (Kosongkan jika tidak diubah)</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan kata sandi baru jika ingin diubah">
                    @error('password')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi kata sandi baru">
                </div>

                <button type="submit" class="btn btn-primary btn-update">Perbarui</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>
</html>