<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unggah File - DocuShare</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        /* Global Body Styling - Disatukan untuk layout halaman upload */
        body {
            max-width: 1200px;
            /* Batasi lebar konten utama */
            margin: 0 auto;
            /* Tengah konten utama */
            overflow-x: hidden;
            /* Mencegah scroll horizontal */
            background-color: #ffffff;
            /* Latar belakang abu-abu muda */
            font-family: 'Roboto', sans-serif;
            padding-top: 70px;
            /* Ruang untuk navbar fixed */

            /* Flexbox untuk memusatkan konten vertikal di halaman upload */
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            /* Mulai dari atas, untuk memberi ruang navbar */
            min-height: 100vh;
            /* Pastikan body mengambil tinggi penuh viewport */
        }

        /* Navbar Styling - Sama dengan halaman Home */
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
        }

        .user-greeting {
            font-size: 1rem;
            color: #555;
            font-weight: 500;
        }

        /* Content Wrapper - Diatur ulang untuk halaman upload */
        .content-wrapper {
            flex-grow: 1;
            /* Membuat content-wrapper mengambil sisa ruang vertikal */
            display: flex;
            /* Aktifkan flexbox untuk menengahkan konten upload */
            flex-direction: column;
            /* Konten di dalam content-wrapper tersusun vertikal */
            justify-content: start;
            /* Memusatkan secara vertikal */
            align-items: center;
            /* Memusatkan secara horizontal */
            padding: 20px 15px;
        }

        /* Settings Icon - Untuk Home, di halaman upload ini akan dihilangkan */
        .settings-icon {
            font-size: 1.5rem;
            color: #333;
            text-decoration: none;
        }

        .settings-icon:hover {
            color: #0d6efd;
        }

        /* Upload Card Styling */
        .upload-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 40px;
            width: 100%;
            width: 100%;
            text-align: center;
            margin-bottom: 30px;
        }

        .upload-icon {
            font-size: 5rem;
            /* Ukuran ikon file */
            color: #6c757d;
            /* Warna abu-abu */
            margin-bottom: 20px;
        }

        .upload-text {
            font-size: 1.1rem;
            color: #555;
            margin-bottom: 0;
        }

        .upload-text a {
            color: #0d6efd;
            /* Warna link biru */
            text-decoration: none;
            font-weight: 500;
        }

        .upload-text a:hover {
            text-decoration: underline;
        }

        .btn-upload-file {
            padding: 12px 40px;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-light navbar-custom fixed-top">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <span class="navbar-brand-custom">DocuShare</span>
            <div class="user-greeting-container">
                <span class="user-greeting">Halo, User!</span>
                <a href="#" class="settings-icon"><i class="fa-solid fa-gear"></i></a>
            </div>
        </div>
    </nav>

    <div class="content-wrapper">

        <div class="upload-card">
            <i class="fa-solid fa-file-lines upload-icon"></i>
            <p class="upload-text">Tarik file ke sini atau <a href="#" id="browse-file-link">Telusuri File</a></p>
            <input type="file" id="file-input" style="display: none;">
        </div>

        <button type="button" class="btn btn-primary btn-upload-file">Unggah</button>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script>
        // JavaScript untuk memicu klik pada input file saat link "Telusuri File" diklik
        document.getElementById('browse-file-link').addEventListener('click', function(e) {
            e.preventDefault(); // Mencegah link default action
            document.getElementById('file-input').click(); // Memicu klik pada input file tersembunyi
        });

        // Contoh bagaimana menangani file yang dipilih (opsional)
        document.getElementById('file-input').addEventListener('change', function() {
            if (this.files && this.files[0]) {
                alert('File terpilih: ' + this.files[0].name);
                // Di sini kamu bisa menampilkan nama file di UI atau mempersiapkannya untuk diunggah
            }
        });

        // Opsional: JavaScript untuk drag-and-drop (lebih kompleks)
        const uploadCard = document.querySelector('.upload-card');

        uploadCard.addEventListener('dragover', (e) => {
            e.preventDefault();
            uploadCard.style.borderColor = '#0d6efd'; // Warna border saat dragover
        });

        uploadCard.addEventListener('dragleave', () => {
            uploadCard.style.borderColor = '#ced4da'; // Kembali ke warna default saat dragleave
        });

        uploadCard.addEventListener('drop', (e) => {
            e.preventDefault();
            uploadCard.style.borderColor = '#ced4da'; // Kembali ke warna default
            const files = e.dataTransfer.files;
            if (files.length > 0) {
                alert('File yang didrop: ' + files[0].name);
                // Di sini kamu bisa menangani file yang didrop,
                // misalnya dengan menugaskannya ke input file atau langsung memprosesnya.
                document.getElementById('file-input').files = files; // Assign files to input
            }
        });
    </script>

</body>

</html>
