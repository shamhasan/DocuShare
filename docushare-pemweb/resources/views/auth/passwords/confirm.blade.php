<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Password - DocuShare</title>

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
        }

        .hero {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-color: #ffffff;
            font-family: 'Roboto', sans-serif;
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

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 700;
            font-family: 'Roboto', sans-serif;
            margin-bottom: 30px; /* Jarak antara logo dan form, sesuaikan jika ada navbar fixed */
            color: #333;
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

        .form-control:focus {
            border-color: #86b7fe;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
            background-color: #fff;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-confirm { /* Class khusus untuk tombol ini */
            width: 100%;
            padding: 12px 15px;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            margin-top: 20px;
        }

        .form-text-info { /* Untuk teks instruksi */
            text-align: left;
            margin-bottom: 20px;
            font-size: 0.95rem;
            color: #555;
        }

        .form-link { /* Untuk link lupa password */
            text-decoration: none;
            font-weight: 500;
            color: #0d6efd;
            font-size: 0.95rem;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-light ">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">DocuShare</span>
        </div>
    </nav>

    <div class="hero">
        <div class="card-form">
            <h2>Konfirmasi Password</h2> <p class="form-text-info">
                Mohon konfirmasi password Anda sebelum melanjutkan.
            </p>

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password">
                    @error('password')
                        <div class="text-danger mt-1" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary btn-confirm">
                    Konfirmasi Password
                </button>

                @if (Route::has('password.request'))
                    <div class="mt-3 text-center">
                        <a class="form-link" href="{{ route('password.request') }}">
                            Lupa Password Anda?
                        </a>
                    </div>
                @endif
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>