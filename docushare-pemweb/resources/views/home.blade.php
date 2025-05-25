<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - DocuShare</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        /* Global Body Styling */
        body {
            max-width: 1200px;
            margin: 0 auto;
            overflow-x: hidden;
            background-color: #ffffff;
            font-family: 'Roboto', sans-serif;
            padding-top: 70px;
            /* Padding top untuk ruang navbar fixed */
        }

        /* Navbar Styling */
        .navbar-custom {
            background-color: #fff;
            padding: 1rem 15px;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1030;
            margin: 0 auto;
            /* Memusatkan navbar sesuai body max-width */
            max-width: 1200px;
            /* Batasi lebar navbar sesuai body */
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

        /* Content Wrapper */
        .content-wrapper {
            padding: 20px 15px;
        }

        /* Search Bar Styling */
        .search-bar-container {
            /* Mengganti .search-bar */
            margin-bottom: 25px;
        }

        .search-input-group {
            /* Mengganti .form-inline */
            width: 100%;
        }

        .search-input {
            /* Mengganti .form-control .mr-sm-2 */
            border-radius: 50px !important;
            padding: 0.75rem 1.25rem;
            background-color: #e9ecef;
            border: none;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, .075);
        }

        .search-input:focus {
            background-color: #fff;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }

        /* Styling untuk tombol search */
        .search-button-addon {
            /* Untuk span yang berisi ikon */
            border-radius: 0 50px 50px 0 !important;
            background-color: #0d6efd;
            border-color: #0d6efd;
            color: #fff;
            /* Warna ikon putih */
            padding: 0.75rem 1.25rem;
            border: none;
            /* Hilangkan border */
            cursor: pointer;
            /* Menunjukkan bisa diklik */
        }

        .search-button-addon:hover {
            /* Efek hover biru */
            background-color: #0b5ed7;
            border-color: #0a58ca;
        }

        /* Upload Button Styling */
        .upload-button-container {
            text-align: right;
            margin-bottom: 25px;
        }

        /* Document List Styling */
        .document-list-container {
            max-height: calc(100vh - 250px);
            /* Sesuaikan jika perlu */
            overflow-y: auto;
            padding-right: 15px;
        }

        .document-item {
            background-color: #e9ecef;
            border-radius: 8px;
            padding: 15px 20px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .document-item-title {
            font-weight: 500;
            color: #333;
        }

        .document-actions .btn {
            padding: 8px 12px;
            border-radius: 5px;
            font-size: 0.9rem;
            margin-left: 10px;
        }

        .document-actions .btn-edit {
            background-color: #6c757d;
            border-color: #6c757d;
            color: #fff;
        }

        .document-actions .btn-edit:hover {
            background-color: #5c636a;
            border-color: #565e64;
        }

        .document-actions .btn-delete {
            background-color: #dc3545;
            border-color: #dc3545;
            color: #fff;
        }

        .document-actions .btn-delete:hover {
            background-color: #bb2d3b;
            border-color: #b02a37;
        }

        .navbar-custom {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.5rem 1rem;
    }

    .user-greeting-container {
        display: flex;
        align-items: center;
        gap: 0.5rem; /* Jarak antara greeting dan ikon gear */
    }

    .user-greeting {
        font-size: 1rem;
        font-weight: 500;
    }

    .settings-icon {
        font-size: 1.2rem;
        color: #333;
        text-decoration: none;
    }

    .settings-icon:hover {
        color: #0d6efd; /* Warna saat hover */
    }

    .btn-search {
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .btn-search:hover {
        background-color: #0d6efd; /* Warna biru saat hover */
        color: #fff; /* Warna ikon menjadi putih */
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

        <div class="search-bar-container">
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Cari dokumen.." aria-label="Search">
                <button class="btn btn-outline-primary btn-search" type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i> 
                </button>
            </form>
        </div>

        <div class="upload-button-container">
            <a href="#" class="btn btn-primary"><i class="fa-solid fa-upload me-2"></i>Unggah Dokumen</a>
        </div>

        <div class="document-list-container">
            <div class="document-item">
                <span class="document-item-title">Dokumen Dummy 1</span>
                <div class="document-actions">
                    <a href="#" class="btn btn-edit"><i class="fa-solid fa-pencil"></i></a>
                    <a href="#" class="btn btn-delete"><i class="fa-solid fa-trash-can"></i></a>
                </div>
            </div>
            <div class="document-item">
                <span class="document-item-title">Dokumen Dummy 2</span>
                <div class="document-actions">
                    <a href="#" class="btn btn-edit"><i class="fa-solid fa-pencil"></i></a>
                    <a href="#" class="btn btn-delete"><i class="fa-solid fa-trash-can"></i></a>
                </div>
            </div>
            <div class="document-item">
                <span class="document-item-title">Dokumen Dummy 3</span>
                <div class="document-actions">
                    <a href="#" class="btn btn-edit"><i class="fa-solid fa-pencil"></i></a>
                    <a href="#" class="btn btn-delete"><i class="fa-solid fa-trash-can"></i></a>
                </div>
            </div>
            <div class="document-item">
                <span class="document-item-title">Laporan Tahunan 2023</span>
                <div class="document-actions">
                    <a href="#" class="btn btn-edit"><i class="fa-solid fa-pencil"></i></a>
                    <a href="#" class="btn btn-delete"><i class="fa-solid fa-trash-can"></i></a>
                </div>
            </div>
            <div class="document-item">
                <span class="document-item-title">Proposal Proyek A</span>
                <div class="document-actions">
                    <a href="#" class="btn btn-edit"><i class="fa-solid fa-pencil"></i></a>
                    <a href="#" class="btn btn-delete"><i class="fa-solid fa-trash-can"></i></a>
                </div>
            </div>
            <div class="document-item">
                <span class="document-item-title">Materi Rapat B</span>
                <div class="document-actions">
                    <a href="#" class="btn btn-edit"><i class="fa-solid fa-pencil"></i></a>
                    <a href="#" class="btn btn-delete"><i class="fa-solid fa-trash-can"></i></a>
                </div>
            </div>
            <div class="document-item">
                <span class="document-item-title">Surat Keputusan C</span>
                <div class="document-actions">
                    <a href="#" class="btn btn-edit"><i class="fa-solid fa-pencil"></i></a>
                    <a href="#" class="btn btn-delete"><i class="fa-solid fa-trash-can"></i></a>
                </div>
            </div>
            <div class="document-item">
                <span class="document-item-title">Invoice Pembayaran D</span>
                <div class="document-actions">
                    <a href="#" class="btn btn-edit"><i class="fa-solid fa-pencil"></i></a>
                    <a href="#" class="btn btn-delete"><i class="fa-solid fa-trash-can"></i></a>
                </div>
            </div>
            <div class="document-item">
                <span class="document-item-title">Daftar Aset E</span>
                <div class="document-actions">
                    <a href="#" class="btn btn-edit"><i class="fa-solid fa-pencil"></i></a>
                    <a href="#" class="btn btn-delete"><i class="fa-solid fa-trash-can"></i></a>
                </div>
            </div>
            <div class="document-item">
                <span class="document-item-title">Panduan F</span>
                <div class="document-actions">
                    <a href="#" class="btn btn-edit"><i class="fa-solid fa-pencil"></i></a>
                    <a href="#" class="btn btn-delete"><i class="fa-solid fa-trash-can"></i></a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>
