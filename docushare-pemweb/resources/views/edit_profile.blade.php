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
            max-width: 1200px; /* Batasi lebar keseluruhan halaman */
            margin: 0 auto; /* Pusatkan body */
            overflow: hidden; /* Mencegah scroll yang tidak diinginkan */
            background-color: #f8f9fa; /* Warna latar belakang abu-abu muda */
            font-family: 'Roboto', sans-serif;
        }

        .hero {
            display: flex;
            flex-direction: column; /* Mengatur arah flex menjadi kolom untuk menempatkan logo di atas */
            justify-content: center; /* Memusatkan secara vertikal */
            align-items: center; /* Memusatkan secara horizontal */
            min-height: 100vh; /* Pastikan hero mengambil tinggi penuh viewport */
            padding: 20px; /* Padding untuk responsivitas di layar kecil */
        }

        .app-logo { /* Menggunakan app-logo seperti di register.blade.php */
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 30px; /* Jarak antara logo dan form */
            color: #333;
        }

        .card-form {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 40px;
            max-width: 450px; /* Lebar maksimal form */
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
            background-color: #e9ecef; /* Warna latar belakang input */
        }
        .form-control[readonly] { /* Gaya khusus untuk input readonly */
            background-color: #e9ecef; /* Pastikan background-nya tetap abu-abu */
            opacity: 1; /* Pastikan tidak buram */
            cursor: default; /* Ubah kursor */
        }

        .form-control:focus {
            border-color: #86b7fe;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
            background-color: #fff;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-update { /* Mengubah nama class btn-daftar menjadi btn-update */
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

    <div class="hero">
        <div class="app-logo">DocuShare</div> <div class="card-form">
            <h2>Perbarui Datamu!</h2>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" value="Ravelius Bonaparte Sitorang" readonly>
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" value="raveliusbp@docushare.com" readonly>
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="#Password123" required>
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