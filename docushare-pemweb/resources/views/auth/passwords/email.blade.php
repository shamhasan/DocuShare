<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - DocuShare</title>

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
            margin-bottom: 30px; 
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

        .btn-submit-email { 
            width: 100%;
            padding: 12px 15px;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            margin-top: 20px;
        }

        .form-text {
            text-align: left;
            margin-top: 15px;
            font-size: 0.95rem;
        }

        .form-text a {
            text-decoration: none;
            font-weight: 500;
            color: #0d6efd;
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
            <h2>Lupa Password?</h2> @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <div class="text-danger mt-1" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary btn-submit-email">
                    Kirim Link Reset Password
                </button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>