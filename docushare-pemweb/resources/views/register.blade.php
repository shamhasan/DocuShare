<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - DocuShare</title>

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
        }

        .hero {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-color: #ffffff;
            /* Warna latar belakang abu-abu muda */
            font-family: 'Roboto', sans-serif;
        }

        .card-form {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            /* Shadow yang lebih halus */
            padding: 40px;
            max-width: 450px;
            /* Lebar maksimal form */
            width: 100%;
            text-align: center;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 700;
            font-family: 'Roboto', sans-serif;
            margin-bottom: 10px;
            color: #333;

        }

        .card-form h2 {
            margin-bottom: 10px;
            /* Jarak bawah dari judul form */
            font-weight: 600;
            /* Sedikit lebih tebal */
            color: #333;
        }

        .form-label {
            text-align: left;
            /* Teks label rata kiri */
            display: block;
            /* Agar label mengambil baris penuh */
            margin-bottom: 3px;
            /* Jarak antara label dan input */
            font-weight: 500;
        }

        .form-control {
            border-radius: 8px;
            /* Border radius lebih besar untuk input */
            padding: 12px 15px;
            /* Padding lebih besar */
            border: 1px solid #ced4da;
            /* Border input standar */
            background-color: #e9ecef;
            /* Warna latar belakang input yang sedikit abu-abu */
        }

        .form-control:focus {
            border-color: #86b7fe;
            /* Warna border saat fokus */
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
            /* Shadow saat fokus */
            background-color: #fff;
            /* Warna latar belakang putih saat fokus */
        }

        .form-group {
            margin-bottom: 20px;
            /* Jarak antar grup form */
        }

        .btn-daftar {
            width: 100%;
            padding: 12px 15px;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            margin-top: 20px;
        }

        .form-text {
            text-align: left;
            /* Teks "Sudah punya akun?" rata kiri */
            margin-top: 15px;
            font-size: 0.95rem;
        }

        .form-text a {
            text-decoration: none;
            /* Hilangkan garis bawah link */
            font-weight: 500;
            color: #0d6efd;
            /* Warna link Bootstrap primary */
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
            <h2>Selamat datang!</h2>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" placeholder="Masukkan nama anda" required>
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Masukkan email anda"
                        required>
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Masukkan kata sandi anda"
                        required>
                </div>
                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation"
                        placeholder="Masukkan kata sandi anda" required>
                </div>

                <p class="form-text">
                    Sudah punya akun? <a href="">Masuk</a>
                </p>

                <button type="submit" class="btn btn-primary btn-daftar">Daftar</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>
